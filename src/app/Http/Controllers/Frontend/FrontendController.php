<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Livewire\Frontend\Checkout\CheckoutShow;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $trendingProducts = Product::where('trending','1')->latest()->take(15)->get();
        $newestProducts = Product::with('productImages')->orderBy('created_at', 'desc')->take(8)->get();
        $discount_Products = Product::selectRaw('*, ((original_price - selling_price) / original_price) * 100 AS discount_percent')
                            ->where('original_price', '>', 0) 
                            ->having('discount_percent', '>', 0)
                            ->orderBy('discount_percent', 'desc')
                            ->get();
        return view('frontend.index', compact('sliders', 'newestProducts', 'discount_Products','trendingProducts'));
    }


    public function searchProduct (Request $request) {
        if ($request->search) {
            
            $search = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(10);
            return view('frontend.pages.search',compact('search'));
        }else {
            return redirect()->back()->with('messsage','There are no products available');
        }
    }

    public function newArrival () {
        $newArrivalProducts = Product::latest()->take(15)->get();
        return view('frontend.pages.new-arrival', compact('newArrivalProducts'));

    }

    public function featuredProducts()  {
        $featuredProducts = Product::where('featured','1')->latest()->get();
        return view('frontend.pages.featured-products', compact('featuredProducts'));   
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

    public function thankyou () {
        return view( 'frontend.thank-you');
    }

}
