@extends('layouts.app')
@section('title',$viewShowProduct['title'])
@section('subtitle',$viewShowProduct['subtitle'])
@section('content')
<div class="flex-row jc-center ai-center">
    <img width="153" src="{{ asset('/storage/'.$viewShowProduct['product']['image']) }}" />
    <div class="flex-column ml-2">
        <h4 class="my-2">{{ $viewShowProduct['product']['name']}}</h4>
        <strong class="my-2">{{ $viewShowProduct['product']['price']}} &euro;</strong>
        <p class="my-2">{{ $viewShowProduct['product']['description']}}</p>
        <form class="my-2" method="POST" action="{{ route('cart.add', ['id'=> $viewShowProduct['product']->id]) }}">
            @csrf
            <input type="number" name="quantity" min="1" max="10" value="1" />
            <button class="bgc-3 color-white ml-2 pyx-1-2 border-r2-5" type="submit">Añadir a la cesta</button>
        </form>
    </div>
</div>
@endsection