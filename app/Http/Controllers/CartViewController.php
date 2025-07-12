<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartViewController extends Controller
{
    public function show($id)
    {
        $card = Product::findOrFail($id);

        // নিশ্চিত করলাম যে category একটি array (JSON field)
        $categories = is_array($card->category) ? $card->category : json_decode($card->category, true);

        // Query: current product বাদ দিয়ে related item বের করব
        $query = Product::query()->where('id', '!=', $card->id);

        if (!empty($categories)) {
            foreach ($categories as $cat) {
                $query->orWhereJsonContains('category', $cat);
            }
        }

        // সর্বোচ্চ 6টি related item
        $related = $query->latest()->take(6)->get();

        // Right slider item (Gift ক্যাটাগরি ধরে)
        $rightSlideItems = Product::whereJsonContains('category', 'Gift')
            ->latest()
            ->get();

        return view('frontend.single-cart-view', compact('card', 'related', 'rightSlideItems'));
    }
}
