<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', '0')->get();
        $newestProducts = Product::with('productImages')->orderBy('created_at', 'desc')->take(8)->get();
        $discount_Products = Product::selectRaw('*, ((original_price - selling_price) / original_price) * 100 AS discount_percent')
                            ->where('original_price', '>', 0) 
                            ->having('discount_percent', '>', 0)
                            ->orderBy('discount_percent', 'desc')
                            ->get();
        return view('frontend.index', compact('sliders', 'newestProducts', 'discount_Products'));
    }
    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.categories.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {

            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }


    public function productView(string  $category_slug,  string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {

            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collections.products.view', compact('product','category'));
            }else {
                return redirect()->back();
            }
        } 
        
        else {
            return redirect()->back();
        }
    }
}
