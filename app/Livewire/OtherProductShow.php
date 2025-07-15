<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class OtherProductShow extends Component
{
    public function render()
    {
        $others = Product::whereJsonContains('category', 'Others')
        ->latest()
        ->take(12)
        ->get();

        return view('livewire.other-product-show', compact('others'));
    }
}
