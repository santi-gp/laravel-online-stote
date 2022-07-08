@extends('layouts.app')
@section('title',$viewProduct['title'])
@section('subtitle',$viewProduct['subtitle'])
@section('content')
<div class="flex-row wrap jc-around">
    @foreach ($viewProduct['products'] as $product)
    <div class="flex-column ai-center my-1">
        <img class="d-block my-2" width="153" height="238" src="{{ asset('/storage/'.$product['image']) }}" />
        <a class="color-2 my-2" href="{{ route('product.show', $product['id']) }}">
            {{$product['name']}}
        </a>
    </div>
    @endforeach

</div>

@endsection