<div class="max-w-5xl mx-auto px-4 py-8 overflow-hidden">
    <div class="flex justify-between">
        <h2 class="text-2xl font-bold mb-6">{{ $productId ? 'Edit Product' : 'Create New Product' }}</h2>
        <a href="{{ route('seller.dashboard') }}">Dashboard</a>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-6 rounded shadow">
        <!-- Title -->
        <div>
            <label class="block font-medium mb-1">Title ( গুরুত্বপূর্ণ * )</label>
            <input type="text" wire:model.defer="title" class="input" placeholder="Product Title">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="md:col-span-2">
            <label class="block font-medium mb-1">Description ( গুরুত্বপূর্ণ * ) </label>
            <textarea wire:model.defer="description" class="input h-24" placeholder="Product Description"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Images -->
        <div>
            <label class="block font-medium mb-1">Product Image Width (200px)	Height (200px) গুরুত্বপূর্ণ * </label>
            <input type="file" wire:model="product_image" class="input">
            @if (is_object($product_image) && method_exists($product_image, 'temporaryUrl'))
                <img src="{{ $product_image->temporaryUrl() }}" class="mt-2 w-24 h-24 object-cover">
            @elseif(is_string($product_image))
                <img src="{{ asset('storage/' . $product_image) }}" class="mt-2 w-24 h-24 object-cover">
            @endif
            @error('product_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Slash ImageWidth (400px)	Height (400px) গুরুত্বপূর্ণ * </label>
            <input type="file" wire:model="slash_image" class="input">
            @if (is_object($slash_image) && method_exists($slash_image, 'temporaryUrl'))
                <img src="{{ $slash_image->temporaryUrl() }}" class="mt-2 w-24 h-24 object-cover">
            @elseif(is_string($slash_image))
                <img src="{{ asset('storage/' . $slash_image) }}" class="mt-2 w-24 h-24 object-cover">
            @endif
            @error('slash_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        {{-- Category Checkbox --}}
        <div>
            <p class="block font-semibold mb-2">Categories (যে কোন তিনটি) ( গুরুত্বপূর্ণ * )</p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @php
                    $categoryOptions = [
                        // 👔 পুরুষদের পোশাক
                        'Gift' => 'গিফট প্যাক',
                        // 👔 পুরুষদের পোশাক
                        'Panjabi' => 'পাঞ্জাবি',
                        'Jubba' => 'জুব্বা',
                        'Shirt' => 'শার্ট',
                        'T-Shirt' => 'টি-শার্ট',
                        'Pants' => 'প্যান্ট',
                        'Jeans' => 'জিন্স',
                        'Lungi' => 'লুঙ্গি',
                        'Pajama' => 'পাজামা',
                        'Suit' => 'সুট',
                        'Waistcoat' => 'ওয়েস্টকোট',
                        'Sweater' => 'সুইটার',
                        'Jacket' => 'জ্যাকেট',
                        'Blazer' => 'ব্লেজার',
                        'Undershirt' => 'গেঞ্জি',
                        'Underwear' => 'জাঙ্গিয়া',

                        // 👗 নারীদের পোশাক
                        'Saree' => 'শাড়ি',
                        'Salwar Kameez' => 'সালওয়ার কামিজ',
                        'Kurti' => 'কুর্তি',
                        'Leggings' => 'লেগিংস',
                        'Blouse' => 'ব্লাউজ',
                        'Dupatta' => 'দুপাত্তা',
                        'Hijab' => 'হিজাব',
                        'Abaya' => 'আবায়া',
                        'Burkha' => 'বোরখা',
                        'Gown' => 'গাউন',
                        'Lehenga' => 'লেহেঙ্গা',
                        'Skirt' => 'স্কার্ট',
                        'Top' => 'টপ',
                        'Nighty' => 'নাইটি',
                        'Bra' => 'ব্রা',
                        'Panty' => 'প্যান্টি',
                        'Camisole' => 'ক্যামিসোল',

                        // 🧥 উভয় লিঙ্গের বা সাধারণ ব্যবহার
                        'Cap' => 'টুপি',
                        'Scarf' => 'স্কার্ফ',
                        'Shoes' => 'জুতা',
                        'Sandal' => 'স্যান্ডেল',
                        'Slippers' => 'স্লিপার',
                        'Socks' => 'মোজা',
                        'Raincoat' => 'রেইনকোট',
                        'Umbrella' => 'ছাতা (অ্যাকসেসরিজ)',

                        // 👶 শিশুদের পোশাক
                        'Baby Frock' => 'শিশুদের ফ্রক',
                        'Baby Pajama' => 'শিশুদের পায়জামা',
                        'Baby Shirt' => 'শিশুদের শার্ট',
                        'Baby Shoes' => 'শিশুদের জুতা',
                    ];
                    @endphp


                @foreach($categoryOptions as $value => $label)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" wire:model="category" value="{{ $value }}" class="form-checkbox text-indigo-600 rounded">
                        <span>{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            @error('category') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="block font-medium mb-1">Status</label>
            <select wire:model.defer="status" class="input">
                <option value="in stock">In Stock</option>
                <option value="out of stock">Out of Stock</option>
            </select>
        </div>

        <!-- Prices -->
        <div>
            <label class="block font-medium mb-1">Real Price ( গুরুত্বপূর্ণ * ) </label>
            <input type="number" wire:model.defer="real_price" class="input" step="0.01">
            @error('real_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-medium mb-1">Offer Price ( গুরুত্বপূর্ণ * ) </label>
            <input type="number" wire:model.defer="offer_price" class="input" step="0.01">
            @error('offer_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <!-- Stock Quantity -->
         <div>
            <label class="block font-medium mb-1">Stock Quantity ( গুরুত্বপূর্ণ * )</label>
            <input type="text" wire:model.defer="stock_quantity" class="input">
            @error($stock_quantity) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Additional Fields -->
        @foreach ([
            'sku' => 'SKU', 'brand' => 'Brand', 'discount_percent' => 'Discount %',
            'weight' => 'Weight (kg)',
            'dimensions' => 'Dimensions (LxWxH)', 'rating' => 'Rating',
            'quality' => 'Quality', 'warranty' => 'Warranty', 'shipping_info' => 'Shipping Info'
        ] as $field => $label)
            <div>
                <label class="block font-medium mb-1">{{ $label }}</label>
                <input type="text" wire:model.defer="{{ $field }}" class="input">
                @error($field) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        @endforeach

        <!-- Tags, Colors, Sizes -->
        <div>
            <label class="block font-medium mb-1">Tags (comma-separated)</label>
            <input type="text" wire:model.defer="tags" class="input">
        </div>
        <div>
            <label class="block font-medium mb-1">Colors</label>
            <input type="text" wire:model.defer="colors" class="input" placeholder="e.g., red,blue">
        </div>
        <div>
            <label class="block font-medium mb-1">Sizes</label>
            <input type="text" wire:model.defer="sizes" class="input" placeholder="e.g., S,M,L">
        </div>

        <!-- Date & Featured -->
        <div>
            <label class="block font-medium mb-1">Published At</label>
            {{-- <input type="date" wire:model.defer="published_at" class="input"> --}}
            <input type="date" wire:model="published_at" value="{{ \Carbon\Carbon::parse($published_at)->format('Y-m-d') }}" class="input" >

        </div>
        {{-- <div class="flex items-center space-x-2">
            <input type="checkbox" wire:model.defer="is_featured" class="rounded border-gray-300">
            <label>Featured Product</label>
        </div> --}}

        <!-- Submit -->
        <div class="md:col-span-2">
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                {{ $productId ? 'Update Product' : 'Create Product' }}
            </button>
        </div>
    </form>
     @livewire('product-list')
</div>
