@extends('layouts.admin')
@section('title', $viewAdminProduct['title'])
@section('subtitle', $viewAdminProduct['subtitle'])
@section('content')
<div class="card">
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="color-red my-1">* {{ $error }}</li>
        @endforeach
    </ul>
    @endif
</div>
<form class="form_product" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" value="{{ old('name') }}" name="name" placeholder="Añadir producto" />
    <input type="number" value="{{ old('price') }}" name="price" placeholder="Añadir precio" />
    <input type="file" value="{{ old('image') }}" name="image">
    <textarea name="description" cols="10" rows="5" placeholder="Descripción">{{ old('description') }}</textarea>
    <button class="fit-content bgc-2 color-1 pyx-1-2 border-r5" type="submit">Guardar</button>
</form>
<div class="grid-color">
    <div class="grid-3 bgc-3 font-bold color-white">
        <div>ID</div>
        <div>Nombre</div>
        <div>Acciones</div>
    </div>
    @foreach($viewAdminProduct['products'] as $product)
    <div class="grid-3">
        <div>{{ $product->id}}</div>
        <div>{{ $product->name }}</div>
        <div>
            <a class="btn-edit" href="{{ route('admin.product.edit',$product->id) }}">
                Editar
            </a>
            <form action="{{ route('admin.product.delete',$product) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn-delete" type="submit">Borrar</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection

