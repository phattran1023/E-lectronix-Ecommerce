<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
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
        $thisMonth= Carbon::now()->format('m');
        $todayOrders = Order::whereDate('created_at',$todayDate)->count();
        $monthOrders = Order::whereMonth('created_at',$thisMonth)->count();

        return view('admin.dashboard',compact('totalProducts','totalCategories','totalBrands','totalUsers','totalOrders','todayOrders','monthOrders'));
    }
}
