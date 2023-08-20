<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function index(){
        // $coupons = Coupon::all();
        $coupons = Coupon::paginate(15);
        $users = User::all();
        return view('admin.coupon.index',compact('coupons','users'));
    }

    public function search(Request $request){
        $searchCoupon = $request->input('searchCoupon');
        $users = User::all();
        if ($searchCoupon) {
            $coupons = Coupon::where(function($query) use ($searchCoupon) {
                $query->where('code', 'like', '%'.$searchCoupon.'%')
                      ->orWhere('status', 'like', '%'.$searchCoupon.'%');
            })->paginate(15);
        } else {
            $coupons = Coupon::paginate(15);
        }
        
        return view('admin.coupon.index',compact('coupons','users'));
    }

    public function couponUser(){
        $user=auth()->user();
        if($user){
            $user_id = $user->id;
            $coupons = Coupon::where('status',$user_id)->get();
            if($coupons){
                return view('admin.coupon.coupon',compact('coupons'));
            }else{
                return view('admin.coupon.coupon')->with('message','No coupon to display!');
            }
        }else{
            return view('admin.coupon.coupon')->with('message','Please login first!');
        }
    }

    public function add(){
        $products = Product::orderBy('name', 'asc')->get();
        $generatedCode = $this->generateCoupon();

        return view('admin.coupon.add', compact('products','generatedCode'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "description" => "required",
            "value" => "required|min:0",
            "max_value" => "required|min:0",
            "date_created" => "required|date|after_or_equal:" . now()->format('Y-m-d\TH:i'),
            "date_expires" => "required|date|after:date_created",
            "type" => "required|in:percent,amount",
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
    
        if ($request->input('type') === 'percent' && $request->input('value') > 100) {
            return redirect()->back()->withErrors(['value' => 'The value cannot be greater than 100 for percent type.']);
        }
    
        if ($request->input('type') === 'amount') {
            if ($request->input('applies') !== 'All Products') {
                $product = Product::where('id', $request->input('applies'))->first();
                if ($request->input('value') > $product->selling_price) {
                    return redirect()->back()->withErrors(['value' => 'The Value cannot be greater than sell price for Amount type. (' . $product->selling_price . ' VND)']);
                }
            }
        }
    
        if ($request->input('applies') !== 'All Products') {
            $product = Product::where('id', $request->input('applies'))->first();
            if ($request->input('max_value') > $product->selling_price) {
                return redirect()->back()->withErrors(['value' => 'The Max Value cannot be greater than sell price for Amount type. (' . $product->selling_price . ' VND)']);
            }
        }
        if ($request->input('status')=='on'){
            $status = 'free';
        }else{
            $status = 'null';
        }
        if ($request->input('quantity')=='1') {
            $coupon = new Coupon;
            $coupon->code = $request->input('code');
            $coupon->applies = $request->input('applies');
            $coupon->type = $request->input('type');
            $coupon->value = $request->input('value');
            $coupon->max_value = $request->input('max_value');
            $coupon->description = $request->input('description');
            $coupon->date_created = $request->input('date_created');
            $coupon->date_expires = $request->input('date_expires');
            $coupon->status = $status;
            $coupon->save();
            return redirect('coupon')->with('message','Added coupon successfully!');
        }else{
            for ($i=0; $i < $request->input('quantity'); $i++) { 
                $generateCoupon = $this->generateCoupon();
                $coupon = new Coupon;
                $coupon->code = $generateCoupon;
                $coupon->applies = $request->input('applies');
                $coupon->type = $request->input('type');
                $coupon->value = $request->input('value');
                $coupon->max_value = $request->input('max_value');
                $coupon->description = $request->input('description');
                $coupon->date_created = $request->input('date_created');
                $coupon->date_expires = $request->input('date_expires');
                $coupon->status = $status;
                $coupon->save();
            }
            return redirect('admin/coupon')->with('message','Added many coupon successfully!');
        }
    }
    public function edit(Coupon $coupon){
        // dd($coupon);
        $products = Product::orderBy('name', 'asc')->get();
        return view('admin.coupon.edit',compact('coupon','products'));
    }
    public function update(Request $request, $coupon){
        $validator = Validator::make($request->all(), [
            "description" => "required",
            "value" => "required|min:0",
            "max_value" => "required|min:0",
            // "date_created" => "required|date|after_or_equal:" . now()->format('Y-m-d\TH:i'),
            // "date_expires" => "required|date|after:date_created",
            "type" => "required|in:percent,amount",
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->date_expires<=$request->date_created){
            return redirect()->back()->withErrors(['value' => 'The Exp Date must geater than create date']);
        }
    
        if ($request->input('type') === 'percent' && $request->input('value') > 100) {
            return redirect()->back()->withErrors(['value' => 'The value cannot be greater than 100 for percent type.']);
        }
    
        if ($request->input('type') === 'amount') {
            if ($request->input('applies') !== 'All Products') {
                $product = Product::where('id', $request->input('applies'))->first();
                if ($request->input('value') > $product->selling_price) {
                    return redirect()->back()->withErrors(['value' => 'The Value cannot be greater than sell price for Amount type. (' . $product->selling_price . ' VND)']);
                }
            }
        }
    
        if ($request->input('applies') !== 'All Products') {
            $product = Product::where('id', $request->input('applies'))->first();
            if ($request->input('max_value') > $product->selling_price) {
                return redirect()->back()->withErrors(['value' => 'The Max Value cannot be greater than sell price for Amount type. (' . $product->selling_price . ' VND)']);
            }
        }
        if ($request->input('status')=='on'){
            $status = 'free';
        }else{
            $status = null;
        }
        $coupon = new Coupon;
        $coupon->code = $request->input('code');
        $coupon->applies = $request->input('applies');
        $coupon->type = $request->input('type');
        $coupon->value = $request->input('value');
        $coupon->max_value = $request->input('max_value');
        $coupon->description = $request->input('description');
        $coupon->date_created = $request->input('date_created');
        $coupon->date_expires = $request->input('date_expires');
        $coupon->status = $status;
        $coupon->save();
        return redirect('admin/coupon')->with('message','Update coupon '. $coupon->code .' successfully!');
    }
    public function generateCoupon(){
        $prefix = "gift-";
        $date = now();
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        do {
            for ($i = 0; $i < 8; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
    
            $formattedDate = $date->format('dmy');
            $randomChars = $randomString;
            $couponCode = $prefix . $formattedDate . $randomChars;

            $check = Coupon::where('code', $couponCode)->first();
        } while ($check);

        return $couponCode;
    }
    public function getRandomCoupon()
    {
        $randomCoupon = Coupon::where('status', '1')->inRandomOrder()->first();
        
        if ($randomCoupon) {
            return response()->json(['randomCode' => $randomCoupon->code]);
        }
        
        return response()->json(['randomCode' => 'See you again!']);
    }
    public function delete($id){
        $coupon = Coupon::where('id', $id)->first();
        if ($coupon) {
            $coupon->delete();
            return redirect()->back()->with('message','Delete coupon code: ' . $coupon->code . ' successfully!');
        }
        return redirect()->back()->with('message','Coupon not exist!');
    }
    public function send(Request $request){
        $User = User::where('id', $request->id)->first();
        $Coupon = Coupon::where('code', $request->sendCodeInput)->first();
    
        if($User && $Coupon){
            $Coupon->status = $User->id;
            $Coupon->save();
    
            return redirect()->back()->with('message', 'Coupon ' . $Coupon->code . ' sent to user: ' . $User->name . ' successfully');
        }else{
            return redirect()->back()->with('message', 'User not found or Coupon not valid!');
        }
    }
}
