@extends('frontend.layouts.master')

@section('title', 'Live Shope Home Page')

@section('content')

    {{-- Slider --}}
    @include('frontend.layouts.components.slider')

    {{-- Product List --}}

    {{-- Livewire Components --}}
    <livewire:gift-cart-show />
    <livewire:all-product-show />
    <livewire:panjabi-show />
    
    {{-- Scripts --}}
    @push('scripts')
        <script src="{{ asset('frontend/js/index.js') }}"></script>
        <script src="{{ asset('frontend/js/alpin-for-add-to-card.js') }}"></script>
    @endpush
@endsection
