@extends('frontend.layouts.master')
@section('head')
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ $card->title }}" />
<meta property="og:description" content="{{ Str::limit(strip_tags($card->description), 50) }}" />
<meta property="og:image" content="{{ asset('storage/' . $card->slash_image) }}" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $card->title }}" />
<meta name="twitter:description" content="{{ Str::limit(strip_tags($card->description), 50) }}" />
<meta name="twitter:image" content="{{ asset('storage/' . $card->slash_image) }}" />
@endsection
@section('content')
    <div class="container w-full h-auto mx-auto border-y-2">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4 mb-10">

            <!-- Image Section -->
            <div class="md:col-span-5 relative">
                <img 
                    src="{{ asset('storage/' . $card->slash_image) }}" 
                    alt="{{ $card->title }}" 
                    class="w-full h-auto object-contain rounded" 
                    id="mainImage"
                >

                <div class="overflow-x-auto mt-3">
                    <div class="flex gap-2 w-max">
                        @foreach ($related as $rel)
                            <a href="{{ route('cart.details', $rel->id) }}">
                                <img 
                                    src="{{ asset('storage/' . $rel->product_image) }}" 
                                    alt="{{ $rel->title }}" 
                                    class="w-24 h-24 object-cover rounded"
                                >
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="md:col-span-4 space-y-4 relative">
                <h2 class="text-2xl font-bold text-red-500">{{ $card->title }}</h2>

                <!-- 👇 Zoom Preview Overlay -->
                <div id="zoomResult"
                    class="hidden absolute top-0 left-1/2 -translate-x-1/2 w-[400px] h-[400px] border border-gray-300 bg-no-repeat bg-white pointer-events-none shadow-lg rounded z-50">
                </div>

                <div class="text-gray-800" style="white-space: pre-wrap;">{!! $card->description !!}</div>

                <div>
                    <h3 class="font-semibold">Brand:</h3>
                    @if($card->status === 'in stock')
                        <p class="text-green-600">✅ {{ $card->status }}</p>
                    @else
                        <p class="text-red-600">❌ {{ $card->status }}</p>
                    @endif
                </div>
                <div>
                    <div class="share-controls mt-6">
                        <h3 class="text-lg font-semibold mb-2">📤 শেয়ার করুন:</h3>
                        <div class="share-buttons flex gap-4 text-2xl">

                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            target="_blank" rel="noopener" class="text-blue-600 hover:text-blue-800">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <!-- WhatsApp -->
                            <a href="https://wa.me/?text={{ urlencode(url()->current()) }}"
                            target="_blank" rel="noopener" class="text-green-500 hover:text-green-600">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <!-- Messenger -->
                            <a href="fb-messenger://share?link={{ urlencode(url()->current()) }}"
                            target="_blank" rel="noopener" class="text-blue-500 hover:text-blue-700">
                                <i class="fab fa-facebook-messenger"></i>
                            </a>

                            <!-- X (Twitter) -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                            target="_blank" rel="noopener" class="text-black hover:text-gray-800">
                                <i class="fab fa-x-twitter"></i>
                            </a>

                        </div>
                    </div>

                </div>
                <div class="text-3xl font-bold text-blue-600">
                    ৳{{ number_format($card->offer_price, 2) }}
                    <span class="text-gray-500 text-lg">
                        <del>৳{{ number_format($card->real_price, 2) }}</del>
                    </span>
                </div>

                <livewire:add-to-cart 
                    :productId="$card->id" 
                    :key="$card->id" 
                    buttonClass="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded w-full"
                />
            </div>

            <!-- Related Items Section -->
            <div class="md:col-span-3 space-y-3">
                @foreach ($related as $item)
                    <a href="{{ route('cart.details', $item->id) }}" 
                    class="flex gap-3 items-center bg-gray-100 p-2 rounded hover:bg-gray-200 transition">
                        <img 
                            src="{{ asset('storage/' . $item->product_image) }}" 
                            alt="{{ $item->title }}" 
                            class="w-20 h-20 object-cover rounded"
                        >
                        <div class="flex-1">
                            @php
                                $title = $item->title;
                                $length = Str::length($title);
                                if ($length > 25) {
                                    $displayTitle = Str::substr($title, 0, 25);
                                } elseif ($length < 25) {
                                    $displayTitle = $title . str_repeat('.', 25 - $length);
                                } else {
                                    $displayTitle = $title;
                                }
                            @endphp

                            <h3 class="font-bold text-lg mt-3 text-gray-800 hover:text-blue-600 transition">
                                {{ $displayTitle }}
                            </h3>
                            <p class="text-green-600 font-semibold mt-1">
                                ৳{{ number_format($item->offer_price, 2) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>

    @include('frontend.layouts.components.right-slider')

    @push('scripts')
        <script src="{{ asset('frontend/js/image-preview.js') }}"></script>
        <script src="{{ asset('frontend/js/right-to-left-slider.js') }}"></script>
    @endpush

@endsection
