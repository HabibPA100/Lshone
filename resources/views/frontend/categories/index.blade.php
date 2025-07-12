@extends('frontend.layouts.master')

@section('title')
    Live Shope - {{ $category }}
@endsection

@section('content')

    @php
        $allCategories = [
            // 🎁 গিফট
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

            // 🧥 উভয় লিঙ্গের
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
    <section class="bg-gray-100 py-6 px-4">
        <div class="max-w-7xl mx-auto">
            <h2>{{ $allCategories[$category] ?? ucfirst($category) }} পণ্য সমূহ</h2>
            <div class="flex flex-wrap -mx-2">
                @if($carts->isNotEmpty())
                @foreach($carts as $cart)
                    <div class="w-full sm:w-1/2 lg:w-1/5 px-2 mb-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="left-bottom-border">
                            <div class="left-linear transition-all duration-300 transform p-2">
                                <img src="{{ asset('storage/' . $cart->product_image) }}" class="w-full h-40 object-cover rounded hover:-translate-y-2 hover:scale-105 hover:opacity-90 transition duration-300" alt="{{ $cart->title }}">
                                @if($cart->status == 'in stock')
                                    <p class="text-green-700">✅{{ $cart->status }}</p>
                                @else
                                    <p class="text-red-700">❌{{ $cart->status }}</p>
                                @endif
                                @php
                                    $title = $cart->title;
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
                                <div class="text-xl font-bold text-blue-600">
                                    <p class="text-green-700"> ৳{{ number_format($cart->offer_price, 2) }} 
                                        <span class="text-gray-500"> 
                                            <del> ৳{{ number_format($cart->real_price, 2) }} </del>
                                        </span>
                                    </p> 
                                </div>
                                <div class="flex justify-between items-center pt-4">
                                    <button class="text-sm bg-gray-300 text-gray-800 px-3 py-1 rounded hover:bg-gray-300 transition"><a href="{{ route('cart.details', $cart->id) }}" class="text-sm bg-gray-100 text-gray-800 px-3 py-1 rounded hover:bg-gray-300 transition">View</a>
                                    </button>
                                    <livewire:add-to-cart 
                                            :productId="$cart->id" 
                                            :key="$cart->id" 
                                            buttonClass="text-sm bg-pink-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition shadow hover:shadow-lg"
                                        />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                 @else
                    <p>এই ক্যাটেগরিতে কোন পণ্য পাওয়া যায়নি।</p>
                @endif
            </div>
            <div id="space">
                <div class="pagination">
                    {{ $carts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>

@endsection
