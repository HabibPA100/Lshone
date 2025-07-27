@extends('frontend.layouts.master')
@section('title', 'Live Shope All Cloth Home')
@section('content')
    <div>
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

        <section class="py-8 px-4 bg-white">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">সব ক্যাটেগরি</h2>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
                    @foreach ($allCategories as $key => $name)
                        <a href="{{ route('products.by-category', $key) }}"
                        class="flex items-center justify-center text-center text-white font-semibold py-3 px-4 rounded-lg 
                                bg-gradient-to-r from-pink-500 to-purple-600 hover:from-purple-600 hover:to-pink-500 
                                transform hover:scale-105 transition duration-300 shadow-md hover:shadow-lg">
                            {{ $name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        @include('frontend.layouts.components.all-category-five-item')
    </div> 
@endsection