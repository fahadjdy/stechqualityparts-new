<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function contact(){
        return view('contact');
    }

    public function category($categorySlug)
    {
        $category = cache()->remember("category_page_{$categorySlug}", 3600, function () use ($categorySlug) {
            return Category::with('products')->where('slug', $categorySlug)->first();
        });

        if (empty($category)) {
            abort(404);
        }

        return view('category', compact('category'));
    }
}
