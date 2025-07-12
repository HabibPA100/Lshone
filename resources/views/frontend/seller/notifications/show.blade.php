@extends('frontend.layouts.seller-layouts.seller-master')
@section('title','Notification Details Page')
@section('content')
    <div class="max-w-xl mx-auto p-4">
        <h1 class="text-xl font-semibold mb-4">অর্ডার বিস্তারিত</h1>

        <div class="border p-4 rounded mb-4">
            <h2 class="text-lg font-semibold">প্রোডাক্ট:</h2>
            <p>নাম: {{ $product['name'] }}</p>
            <p>দাম: {{ $product['price'] }}</p>
            {{-- @dd($product['quantity']); --}}
            <p>পরিমাণ: {{ $product['quantity'] ?? 1 }}</p>
            <div>
                {{ $orderTime }}
            </div>
        </div>

    </div>
@endsection
