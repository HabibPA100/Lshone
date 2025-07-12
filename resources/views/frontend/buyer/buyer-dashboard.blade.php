@extends('frontend.layouts.buyer-layouts.buyer-master')
@section('title', 'Buyer Dashboard')
@section('content')
    @livewire('buyer.order-status')
    @livewire('cart-page')
    @include('frontend.buyer.components.buy-cart-info')
@endsection