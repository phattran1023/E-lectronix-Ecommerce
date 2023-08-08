<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use App\Mail\MailController;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class CheckoutController extends Controller
{
    public function index () {
        return view('frontend.checkout.index');
    }
    public function callbackMomo () {
        $pendingOrder = session()->get('pending_order');
        $orderId = $_GET['orderId'];
        $resultCode = $_GET['resultCode'];
        // dd(session('pending_order'),$orderId, $resultCode);
        if($resultCode==0){
            if(session('pending_order')){
                $this->aftercheck();                
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
            Cart::where('user_id', auth()->user()->id)->delete();
            Mail::to($order->email)->send(new MailController($order));
        }else {
            return redirect()->to('thank-you')->with('message', 'Payment error!');
        }
    }
}
