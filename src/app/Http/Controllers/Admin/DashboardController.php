<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count();
        $totalUsers = User::count();
        $totalOrders = Order::count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $todayOrders = Order::whereDate('created_at', $todayDate)->count();
        $monthOrders = Order::whereMonth('created_at', $thisMonth)->count();
        $todayRevenue = Orderitem::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereDate('orders.created_at', Carbon::today())
            ->sum('order_items.price');
        // Lấy data chart 1
        $monthlyOrders = Order::selectRaw('YEAR(created_at) year, MONTH(created_at) month, COUNT(*) as total_orders')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $labels = [];
        $values = [];

        foreach ($monthlyOrders as $order) {
            $labels[] = $order->month . '/' . $order->year;
            $values[] = $order->total_orders;
        }

        // Data chart 2
        $brands = Brand::all();

        $brandLabels = $brands->pluck('name');
        $brandData = [];

        foreach ($brands as $brand) {
            $productCount = Product::where('brand', $brand->name)->count();
            $brandData[] = $productCount;
        }



        //Data chart Doanh thu
        $monthlyRevenue = Orderitem::selectRaw('YEAR(created_at) year, MONTH(created_at) month, SUM(price * quantity) as total_revenue')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $revenueLabels = [];
        $revenueData = [];

        foreach ($monthlyRevenue as $revenue) {
            $revenueLabels[] = $revenue->month . '/' . $revenue->year;
            $revenueData[] = $revenue->total_revenue;
        }

        // Data User chart
        $userRoles = User::groupBy('role_as')
            ->selectRaw('role_as, COUNT(*) as user_count')
            ->get();

        $roleLabels = $userRoles->pluck('role_as');
        $roleData = $userRoles->pluck('user_count');

        $roleLabels = $roleLabels->map(function ($role) {
            switch ($role) {
                case 0:
                    return 'User';
                case 1:
                    return 'Admin';
                case 3:
                    return 'Twitter/Google User';
                default:
                    return '';
            }
        });



        $chartData = [
            'labels' => $labels,
            'values' => $values,
            'brandLabels' => $brandLabels,
            'brandData' => $brandData,
            'revenueLabels' => $revenueLabels,
            'revenueData' => $revenueData,
            'roleLabels' => $roleLabels,
            'roleData' => $roleData,
        ];

        //Top 3 người mua nhiều nhất
        $topBuyers = User::join('orders', 'users.id', '=', 'orders.user_id')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->selectRaw('users.name, users.email, SUM(order_items.quantity * order_items.price) as total_spent')
        ->groupBy('users.id', 'users.name', 'users.email')
        ->orderByDesc('total_spent')
        ->limit(3)
        ->get();

        // Top 3  sp mua nhiều nhất
        $topProducts = Product::join('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('products.name, SUM(order_items.quantity) as total_quantity, SUM(order_items.quantity * order_items.price) as total_revenue')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_quantity')
            ->limit(3)
            ->get();

        return view('admin.dashboard', compact('totalProducts', 'totalCategories', 'totalBrands', 'totalUsers', 'totalOrders', 'todayOrders', 'monthOrders', 'todayRevenue', 'chartData','topBuyers','topProducts'));
    }
}