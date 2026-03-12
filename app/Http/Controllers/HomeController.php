<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = \App\Models\Slider::where('status', 'active')->get();
        $categories = \App\Models\Category::withCount('products')->get();
        $featuredProducts = \App\Models\Product::latest()->limit(8)->get();
        $testimonials = \App\Models\Testimonial::all();
        $profile = \App\Models\CompanyProfile::first();

        return view('pages.home', compact('sliders', 'categories', 'featuredProducts', 'testimonials', 'profile'));
    }

    public function contact(){
        return view('pages.contact');
    }

    public function category($categorySlug)
    {
        $category = \App\Models\Category::with('products')->where('slug', $categorySlug)->firstOrFail();

        return view('pages.category', compact('category'));
    }

    public function product($productSlug)
    {
        $product = \App\Models\Product::where('slug', $productSlug)->firstOrFail();
        
        // Fetch related products from the same category
        $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('pages.product-details', [
            'product' => $product,
            'related' => $relatedProducts
        ]);
    }

    public function gallery()
    {
        $images = \App\Models\Gallery::all();

        return view('pages.gallery', compact('images'));
    }

    public function products()
    {
        $products = \App\Models\Product::with('category')->paginate(12);

        return view('pages.products', compact('products'));
    }

    public function about()
    {
        $profile = \App\Models\CompanyProfile::first();
        return view('pages.about', compact('profile'));
    }
}
