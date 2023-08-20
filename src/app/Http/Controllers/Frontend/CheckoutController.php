<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Orderitem;
use App\Models\CouponOrder;
use App\Mail\MailController;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class CheckoutController extends Controller
{
    public function index () {
        return view('frontend.checkout.index');
    }
    public function addCoupon(Request $request){
        $couponCode = $request->couponCode;
        $stringProductAmount =$request->totalProductAmount;
        $totalProductAmount = intval(str_replace(',', '', $stringProductAmount));
        $coupon = Coupon::where('code', $couponCode)->first();
        if($coupon){
            if($coupon->date_expires<now()){
                return redirect()->back()->with('errorCoupon','This Coupon code expires!');
            }
            if($coupon->date_created>now()){
                return redirect()->back()->with('errorCoupon','This Coupon code not begin!');
            }
            $user = auth()->user();
            if($coupon->status=="free" || $coupon->status==$user->id){
                if($coupon->type=="percent"){
                    $discountAmount = round($coupon->value / 100 * $totalProductAmount,0);
                    if($discountAmount > $coupon->max_value){
                        $discountAmount = $coupon->max_value;
                    }
                }else{
                    $discountAmount = $coupon->value;
                }
            }else{
                session()->forget('couponCode');
                session()->forget('discount');
                return redirect()->back()->with('errorCoupon','This Coupon code is not for you!');
            }
        }else{
            session()->forget('couponCode');
            session()->forget('discount');
            return redirect()->back()->with('errorCoupon','Coupon invalid!');
        }

        $totalAmount = $totalProductAmount - $discountAmount;

        session()->put('couponCode',$couponCode);
        session()->put('discount',$discountAmount);

        return redirect()->back()
        ->with('successCoupon','Coupon '.$couponCode.' added')
        ->with('discountAmount',$discountAmount)
        ->with('totalProductAmount',$totalProductAmount)
        ->with('totalAmount',$totalAmount);
    }
    public function callbackMomo () {
        $pendingOrder = session()->get('pending_order');
        $orderId = $_GET['orderId'];
        $resultCode = $_GET['resultCode'];
        // dd(session('pending_order'),$orderId, $resultCode);
        if($resultCode==0){
            if(session('pending_order')){
                
                $this->aftercheck();

                if(session('couponCode')){
                    $this->delCoupon(session('couponCode'));
                    Session::forget('couponCode');               
                }
                
                Session::forget('pending_order');
                
                return redirect()->to('thank-you')->with('message', 'Payment momo Successfully!');
            }else{
                return redirect()->to('thank-you')->with('message', 'Inoice had been created yet!');
            }
        }
    }
    public function callbackMomoQR () {
        $pendingOrder = session()->get('pending_order');
        $orderId = $_GET['orderId'];
        $errorCode = $_GET['errorCode'];
        // dd(session('pending_order'),$orderId, $errorCode);
        if($errorCode==0){
            if(session('pending_order')){
                $this->aftercheck();

                if(session('couponCode')){
                    $this->delCoupon(session('couponCode'));
                    Session::forget('couponCode');               
                }     

                Session::forget('pending_order');

                return redirect()->to('thank-you')->with('message', 'Payment momo Successfully!');
            }else{
                return redirect()->to('thank-you')->with('message', 'Inoice had been created yet!');
            }
        }
    }    
    public function aftercheck(){
        $pendingOrder = session()->get('pending_order');
        if ($pendingOrder) {
            $order = Order::create([
                'user_id' => $pendingOrder['user_id'],
                'tracking_no' => $pendingOrder['tracking_no'],
                'fullname' => $pendingOrder['fullname'],
                'email' => $pendingOrder['email'],
                'phone' => $pendingOrder['phone'],
                'pincode' => $pendingOrder['pincode'],
                'address' => $pendingOrder['address'],
                'status_message' => $pendingOrder['status_message'],
                'payment_mode' => $pendingOrder['payment_mode'],
                'payment_id' => $pendingOrder['payment_id'],
            ]);
            // dd($pendingOrder['order_items']);
            foreach ($pendingOrder['order_items'] as $cartItem) {
                $orderItems = Orderitem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem['product_id'],
                    'product_color_id' => $cartItem['product_color_id'],
                    'quantity' =>  $cartItem['quantity'],
                    'price' => $cartItem['price']
                ]);
                if ($orderItems->product_color_id != null) {
                    $productColor = ProductColor::where('id', $orderItems->product_color_id)->first();
                    $oldquantity =$productColor->quantity;
                    if ($productColor) {
                        $productColor->decrement('quantity', $orderItems->quantity);
                    }
                    $newquantity = $productColor->quantity;
                } else {
                    $product = Product::where('id', $orderItems->product_id)->first();
                    if ($product) {
                        $product->decrement('quantity', $orderItems->quantity);
                    }
                }
            }
            $this->addCouponOrder($order->id);
            Cart::where('user_id', auth()->user()->id)->delete();
            Mail::to($order->email)->send(new MailController($order));
        }else {
            return redirect()->to('thank-you')->with('message', 'Payment error!');
        }
    }
    public function delCoupon($couponCode){
        $coupon = new Coupon;
        $coupon = Coupon::where('code', $couponCode)->first();;
        if($coupon){
            $coupon->delete();
        }
    }
    public function addCouponOrder($order_id){
        if(session('couponCode')){
            $couponCode = session('couponCode');
            $discount = session('discount');
            $couponOrder = new CouponOrder;
        
            $couponOrder->order_id = $order_id;
            $couponOrder->code = $couponCode;
            $couponOrder->discount_amount = $discount;
            $couponOrder->save();
        }
    }
}
