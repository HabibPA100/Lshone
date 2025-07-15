<div>
@if ($others->isNotEmpty())
    <section class="bg-gray-100 py-8 px-4">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('cart.category', 'Others') }}">
                <h1 class="text-3xl font-bold text-center text-white mb-8">🎁 Other Package</h1>
            </a>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-2">
                @foreach($others as $other)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-2 relative group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        
                        {{-- Product Image --}}
                        <img src="{{ asset('storage/' . $other->product_image) }}" 
                            alt="{{ $other->title }}" 
                            class="w-full h-40 object-cover rounded-md mb-3 transform group-hover:scale-105 transition duration-300">

                        {{-- Title --}}
                        @php
                            $title = $other->title;
                            $length = Str::length($title);
                            if ($length > 25) {
                                $displayTitle = Str::substr($title, 0, 25);
                            } elseif ($length < 25) {
                                $displayTitle = $title . str_repeat('.', 25 - $length);
                            } else {
                                $displayTitle = $title;
                            }
                        @endphp

                        <h3 class="text-md font-semibold text-gray-800 mb-1 truncate hover:text-blue-600 transition">{{ $displayTitle }}</h3>

                        {{-- Stock Status --}}
                        @if($other->status == 'in stock')
                            <p class="text-green-600 text-sm mb-1">✅ {{ $other->status }}</p>
                        @else
                            <p class="text-red-600 text-sm mb-1">❌ {{ $other->status }}</p>
                        @endif

                        {{-- Price --}}
                        <p class="text-green-700 text-lg font-bold">
                            ৳{{ number_format($other->offer_price, 2) }}
                            <span class="text-gray-400 text-sm ml-1">
                                <del>৳{{ number_format($other->real_price, 2) }}</del>
                            </span>
                        </p>

                        {{-- Buttons --}}
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('cart.details', $other->id) }}" 
                            class="text-sm bg-gray-200 text-gray-800 px-3 py-1 rounded hover:bg-gray-300 transition">
                                View
                            </a>

                            <livewire:add-to-cart 
                                :productId="$other->id" 
                                :key="$other->id" 
                                buttonClass="text-sm bg-blue-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition shadow hover:shadow-lg"
                            />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endif

</div>