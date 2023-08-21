<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\CouponOrder;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        // $todayDate = Carbon::now();
        // $orders = Order::whereDate('created_at',$todayDate)->paginate(2);
        $todayDate = Carbon::now()->format('Y-m-d');
        // dd($todayDate);

        $orders = Order::when($request->date != null, function ($q) use ($request) {

            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todayDate) {
            $q->whereDate('created_at', $todayDate);
        })
            ->when($request->status != null, function ($q) use ($request) {

                return $q->where('status_message', $request->status);
            })
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    // public function show(int $orderId)
    // {

        
    //     $order = Order::where('id', $orderId)->first();
   
    //     if ($order) {
    //         return view('admin.orders.view', compact('order'));
    //     } else {
    //         return redirect('admin/orders')->with('message', 'Order not found');
    //     }
    // }


    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        $couponOrder = CouponOrder::Where('order_id', $orderId)->first();
        if ($order) {
            $dateFilter = request()->query('date'); // Retrieve the 'date' query parameter

            return view('admin.orders.view', compact('order', 'dateFilter', 'couponOrder'));
        } else {
            return redirect('admin/orders')->with('message', 'Order not found');
        }
    }



    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orderId)->with('message', 'Order updated successfully');
        } else {
            return redirect('admin/orders/' . $orderId)->with('message', 'Order not found');
        }
    }


    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $couponOrder = CouponOrder::Where('order_id', $orderId)->first();
        return view('admin.invoice.generate-invoice', compact('order', 'couponOrder'));
    }

    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);

        $todayDate = Carbon::now()->format('Y-m-d');
        return $pdf->download('invoice-' . $order->id . '-' . $todayDate . '.pdf');
    }
}
