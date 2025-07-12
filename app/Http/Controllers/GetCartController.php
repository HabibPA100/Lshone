<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GetCartController extends Controller
{
    public function showCategoryCart($category)
    {
        // পেজিনেশনসহ প্রোডাক্ট ফিল্টার করা
        $carts = Product::whereJsonContains('category', $category)
                        ->latest()
                        ->paginate(12);

        return view('frontend.categories.index', compact('carts', 'category'));
    }
}
