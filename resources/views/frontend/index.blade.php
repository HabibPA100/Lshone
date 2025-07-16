@extends('frontend.layouts.master')

@section('title', 'Live Shope')

@section('content')

    {{-- Slider --}}
    @include('frontend.layouts.components.slider')
    <div>
        <h1> এই সাইট টি এখন টেস্টিং মুডে আছে সিগরই চালু হবে ইনশা-আল্লাহ </h1>
    </div>
    {{-- Product List --}}

    {{-- Livewire Components --}}
    <livewire:other-product-show />
    <livewire:gift-cart-show />
    <livewire:all-product-show />
    <livewire:panjabi-show />
     
    {{-- Scripts --}}
    @push('scripts')
        <script src="{{ asset('frontend/js/index.js') }}"></script>
        <script src="{{ asset('frontend/js/alpin-for-add-to-card.js') }}"></script>
    @endpush
@endsection
