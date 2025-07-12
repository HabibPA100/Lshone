
<section class="bg-gray-100 py-6 px-4">
    <div class="max-w-7xl mx-auto">
        <a href="{{ route('all.product') }}">
            <h1 class="text-3xl font-bold mb-2">সকল পণ্য সমূহ </h1>
        </a>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div class="relative bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl group"
                data-aos="fade-up" data-aos-duration="800">
                
                <!-- Animated Border -->
                <div class="absolute inset-0 z-0 pointer-events-none glow-border rounded-xl">
                    <span class="absolute w-full h-1 bg-gradient-to-r from-pink-500 via-yellow-400 to-green-400 animate-border-spin top-0 left-0"></span>
                    <span class="absolute h-full w-1 bg-gradient-to-b from-pink-500 via-yellow-400 to-green-400 animate-border-spin right-0 top-0 delay-100"></span>
                    <span class="absolute w-full h-1 bg-gradient-to-l from-pink-500 via-yellow-400 to-green-400 animate-border-spin bottom-0 right-0 delay-200"></span>
                    <span class="absolute h-full w-1 bg-gradient-to-t from-pink-500 via-yellow-400 to-green-400 animate-border-spin left-0 bottom-0 delay-300"></span>
                </div>

                <!-- Card Content -->
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->title }}" class="w-full object-cover aspect-[4/4] relative z-10">
                
                <div class="p-4 space-y-3 relative z-10">
                    @php
                        $title = $product->title;
                        $length = Str::length($title);
                        if ($length > 25) {
                            $displayTitle = Str::substr($title, 0, 25); // কেটে ২৫ অক্ষর নেওয়া
                        } elseif ($length < 25) {
                            $displayTitle = $title . str_repeat('.', 25 - $length); // যতটুকু ঘাটতি, ততগুলো . যোগ
                        } else {
                            $displayTitle = $title; // ঠিক ২৫ হলে, যেভাবে আছে সেভাবেই
                        }
                    @endphp

                    <h3 class="font-bold text-lg mt-3 text-gray-800 hover:text-blue-600 transition">
                        {{ $displayTitle }}
                    </h3>
                    @if($product->status == 'in stock')
                        <p class="text-green-700">✅{{ $product->status }}</p>
                    @else
                        <p class="text-red-700">❌{{ $product->status }}</p>
                    @endif

                    <div class="text-xl font-bold text-blue-600">
                        <p class="text-green-700"> ৳{{ number_format($product->offer_price, 2) }} 
                            <span class="text-gray-500"> 
                                <del> ৳{{ number_format($product->real_price, 2) }} </del>
                            </span>
                        </p> 
                    </div>

                    <div class="flex justify-between items-center pt-2">
                        <button class="text-sm bg-gray-700 text-green-700 px-3 py-1 rounded hover:bg-gray-300 transition"><a href="{{ route('cart.details', $product->id) }}" class="text-sm bg-gray-100 text-gray-800 px-3 py-1 rounded hover:bg-gray-300 transition">View</a>
                        </button>
                        <livewire:add-to-cart 
                                        :productId="$product->id" 
                                        :key="$product->id" 
                                        buttonClass="text-sm bg-yellow-400 text-white px-4 py-2 rounded hover:bg-pink-600 transition shadow hover:shadow-lg"
                                    />
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination Links -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</section>
