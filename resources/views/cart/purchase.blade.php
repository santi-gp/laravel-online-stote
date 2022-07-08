@extends('layouts.app')
@section('title',$purchaseData['title'])
@section('subtitle',$purchaseData['subtitle'])
@section('content')
  <div>
    <h3>Compra completada</h3>
    <div>
      <p>Felicidades, su número de compra es <strong>{{$purchaseData['order']->id}}</strong></p>
    </div>
  </div>
@endsection