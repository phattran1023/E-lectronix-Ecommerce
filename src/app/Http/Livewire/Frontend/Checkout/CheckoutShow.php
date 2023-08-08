<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\MailController;
use Illuminate\Support\Facades\Mail;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0;


    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    //Listener for paypal payment
    protected $listeners =[
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder',
        'momoOrderEmit' => 'momoOrder',
    ];

    public function paidOnlineOrder ($value) {
        $this -> payment_id = $value;
        $this -> payment_mode = 'Paid by Paypal';

        $codOrder = $this->placeOrder();
        if ($codOrder) {

            // When checkout is successful, delete the Cart items
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->sendInvoiceEmail($codOrder->id);

            session()->flash('message', 'Placed order successfully');

            $this->dispatchBrowserEvent('message', [
                'text' => 'Order placed successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function validationForAll () {
        $this->validate();
    }



    //validate data input
    public function rules()
    {
        return [
            'fullname' => 'required|string|max:120',
            'email' => 'required|email|max:120',
            'phone' => 'required|string|max:12|min:9',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }


    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'Order-' . Str::random(6),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'In Progress...',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,

        ]);
        foreach ($this->carts as $cartItem) {
            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);

            //When checkout decreases the quantity
            if ($cartItem->product_color_id != null) {
                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            } else {
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }
        return $order;
    }



    public function codOrder()
    {
        $this->payment_mode = 'Cash On Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) {

            // When checkout is successful, delete the Cart items
            Cart::where('user_id', auth()->user()->id)->delete();

            session()->flash('message', 'Placed order successfully');

            $this->dispatchBrowserEvent('message', [
                'text' => 'Order placed successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }




    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }



    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }

    public function placeOrderMomo(){
        $orderData = [
            'user_id' => auth()->user()->id,
            'tracking_no' => 'Order-' . Str::random(6),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'In Progress...',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
            'order_items' => [],
        ];
        foreach ($this->carts as $cartItem) {
            $orderItems = [
                'product_id' => $cartItem->product->id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price,
            ];
            $orderData['order_items'][] = $orderItems;
        }
        session()->put('pending_order', $orderData);
    }

    public function momoOrder($orderId)
    {
        $this->payment_id = $orderId;
        $this->payment_mode = 'Paid by MoMo';
        $momoOrder = $this->placeOrderMomo(); 
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function checkoutHadle($amout)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Payment with MoMo";
        $orderId = time() . "";
        $redirectUrl = Route('paymentCallback');
        $ipnUrl = Route('paymentCallback');
        $extraData = "";

        $amount = $amout;
        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
        ];

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true); // decode json
        $resultCode = $jsonResult['resultCode'];
        $resultDescription = $jsonResult['message'];

        $this->momoOrder($orderId);
        return redirect()->away($jsonResult['payUrl']);
    }

    public function checkoutHadleQR($amout)
    {
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $requestId = time() . "";
        $amount = "$amout";
        $orderId = time() . "";
        $orderInfo = "order information";
        $returnUrl = Route('paymentCallbackQR');
        $notifyUrl = Route('paymentCallbackQR');
        $extraData = "";
        $requestType ="captureMoMoWallet";
        $extraData = "";

        $rawHash =  "partnerCode=".$partnerCode.
                    "&accessKey=".$accessKey.
                    "&requestId=".$requestId.
                    "&amount=".$amount.
                    "&orderId=".$orderId.
                    "&orderInfo=".$orderInfo.
                    "&returnUrl=".$returnUrl.
                    "&notifyUrl=".$notifyUrl.
                    "&extraData=".$extraData;

        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array(
            'accessKey' => $accessKey,
            'partnerCode' => $partnerCode,
            'requestType' => $requestType,
            'notifyUrl' => $notifyUrl,
            'returnUrl' => $returnUrl,
            'orderId' => $orderId,
            'amount' => $amount,
            'orderInfo' => $orderInfo,
            'requestId' => $requestId,
            'extraData' => $extraData,
            'signature' => $signature
        );

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true); 

        $this->momoOrder($orderId);
        return redirect()->away($jsonResult['payUrl']);

    }

    public function sendInvoiceEmail($orderId)
    {    
        $order = Order::findOrFail ($orderId);
        // Gửi email
        Mail::to($order->email)->send(new MailController($order));

    }
}
