<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class GiftCartShow extends Component
{
    public function render()
    {
        $gifts = Product::whereJsonContains('category', 'Gift')
        ->latest()
        ->take(5)
        ->get();
        
        return view('livewire.gift-cart-show', compact('gifts'));
    }
}
