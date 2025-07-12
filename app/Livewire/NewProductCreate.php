<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class NewProductCreate extends Component
{
    use WithFileUploads;

    public $productId;
    public $product_image;
    public $slash_image;
    public $title, $description;
    public $status = 'in stock';
    public $offer_price, $real_price, $category = [], $views = 0, $seller_id;

    // নতুন ইনপুট ফিল্ডগুলো
    public $sku, $brand, $discount_percent, $tags = [];
    public $stock_quantity;
    public $weight, $dimensions;
    public $colors = [], $sizes = [];
    public $warranty, $shipping_info;
    public $published_at;
    public $is_featured = false;
    public $rating, $quality;

    public function rules()
    {
        return [
            'product_image' => $this->productId ? 'nullable|image|mimes:jpg,png,jpeg,gif,webp,avif' : 'required|image|mimes:jpg,png,jpeg,gif,webp,avif',
            'slash_image' => $this->productId ? 'nullable|image|mimes:jpg,png,jpeg,gif,webp,avif' : 'required|image|mimes:jpg,png,jpeg,gif,webp,avif',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:in stock,out of stock',
            'offer_price' => 'required|numeric',
            'real_price' => 'required|numeric',
            'category' => ['required', 'array', function ($attribute, $value, $fail) {
                if (count($value) > 3) {
                    $fail('আপনি একটি আইটেমের জন্য তিনটির বেশি ক্যাটেগরি নির্বাচন করতে পারবেন না ?');
                }
            }],
            'views' => 'nullable|integer',
            'rating'=> 'nullable|string',
            'quality'=> 'nullable|string',
            'sku' => 'nullable|string|unique:products,sku,' . $this->productId,
            'brand' => 'nullable|string|max:100',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'tags' => 'nullable|array',
            'stock_quantity' => 'required|integer|min:0',
            'weight' => 'nullable|numeric',
            'dimensions' => 'nullable|string',
            'colors' => 'nullable|array',
            'sizes' => 'nullable|array',
            'warranty' => 'nullable|string',
            'shipping_info' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
        ];
    }

    public function save()
    {
        $this->validate();

        $productImagePath = $this->product_image ? $this->product_image->store('products', 'public') : null;
        $slashImagePath = $this->slash_image ? $this->slash_image->store('slashes', 'public') : null;

        $product = Product::updateOrCreate(
            ['id' => $this->productId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
                'offer_price' => $this->offer_price,
                'real_price' => $this->real_price,
                'category' => $this->category,
                'views' => $this->views,
                'seller_id' => Auth::user()->id,
                'product_image' => $productImagePath ?? Product::find($this->productId)?->product_image,
                'slash_image' => $slashImagePath ?? Product::find($this->productId)?->slash_image,
                'sku' => $this->sku,
                'brand' => $this->brand,
                'discount_percent' => $this->discount_percent,
                'tags' => $this->tags,
                'stock_quantity' => $this->stock_quantity,
                'weight' => $this->weight,
                'dimensions' => $this->dimensions,
                'colors' => $this->colors,
                'sizes' => $this->sizes,
                'warranty' => $this->warranty,
                'shipping_info' => $this->shipping_info,
                'published_at' => $this->published_at,
                'is_featured' => $this->is_featured,
                'rating' => $this->rating,
                'quality' => $this->quality,
            ]
        );
        $this->dispatch('swal:success', data: [
            'title' => $this->title,
            'text' => 'আপনি সফলভাবে একটি পণ্য যুক্ত করেছেন ! ধন্যবাদ '
        ]);

        $this->resetExcept('status');
    }

    protected $listeners = ['editProduct' => 'edit'];

    public function edit($id)
    {
        $product = Product::where('id', $id)->where('seller_id', Auth::id())->firstOrFail();
        $this->fill($product->toArray());
        $this->productId = $product->id;
    }

    public function delete(Product $product)
    {
        $product->delete();
        session()->flash('message', 'Product deleted successfully!');
    }

    public function render()
    {
        return view('livewire.new-product-create', [
            'products' => Product::where('seller_id', Auth::id())->latest()->get(),
        ]);
    }
}
