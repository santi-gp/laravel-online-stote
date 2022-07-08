@extends('layouts.app')
@section('title',$cartData['title'])
@section('subtitle',$cartData['subtitle'])
@section('content')
<div class="grid-color my-1">
    <div class="grid-4 bgc-3 font-bold color-white">
        <div>Id</div>
        <div>Nombre</div>
        <div>Precio</div>
        <div>Cantidad</div>
    </div>
    @foreach($cartData['products'] as $product)
    <div class="grid-4">
        <div>{{ $product->id }}</div>
        <div>{{ $product->name }}</div>
        <div>{{ $product->price }} &euro;</div>
        <div>{{ session('products')[$product->id] }}</div>
    </div>
    @endforeach
</div>
<div class="flex-row jc-around ai-center my-2">
    <a href="#">Total a pagar: {{ $cartData['total'] }} &euro;</a>
    @if (count($cartData["products"]) > 0)
    <a href="{{ route('cart.purchase') }}">Comprar</a>
    <a href="{{ route('cart.delete') }}">Eliminar productos</a>
    @endif
</div>
@endsection