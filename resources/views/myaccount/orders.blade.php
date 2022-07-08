@extends('layouts.app')
@section('title', $accountData["title"])
@section('subtitle', $accountData["subtitle"])
@section('content')
@forelse($accountData['orders'] as $order)
<div>
    <h4>Pedido #{{ $order->id }}</h4>
</div>
<div>
    <p class="my-0-5">Fecha: <strong>{{ $order->created_at	}}</strong></p>
    <p>Total: <strong>{{ $order->total }} &euro;</strong></p>
</div>
<div class="my-1 grid-color">
    <div class="grid-4 bgc-2 font-bold color-1">
        <div>Item ID</div>
        <div>Producto</div>
        <div>Precio</div>
        <div>Cantidad</div>
    </div>
    @foreach($order->getItems() as $item)
    <div class="grid-4">
        <div>{{ $item->id }}</div>
        <div>
            <a href="{{ route('product.show',  ['product'=>$item->getProduct()->id]) }}">
                <!-- 'product'=> is the parameter of the routes -->
                {{ $item->getProduct()->name }}
            </a>
        </div>
        <div>{{ $item->price }}</div>
        <div>{{ $item->quantity }}</div>
    </div>
    @endforeach
</div>
@empty
<div>
    <p>No ha comprado nada en nuestra tienda.</p>
</div>
@endforelse
@endsection