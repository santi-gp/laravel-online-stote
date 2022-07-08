@extends('layouts.admin')
@section('title', $editProduct['title'])
@section('subtitle', $editProduct['subtitle'])
@section('content')
<form class="form_product" action="{{ route('admin.product.update', $editProduct['product']->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" value="{{ $editProduct['product']->name }}" name="name" />
    <input type="number" value="{{ $editProduct['product']->price }}" name="price" />
    <input  type="file"  value="{{ $editProduct['product']->image }}" name="image" />
    <textarea name="description" cols="10" rows="5">{{ $editProduct['product']->description }}</textarea>
    <button class="fit-content bgc-2 color-1 pyx-1-2 border-r5" type="submit">Editar</button>
</form>
@endsection