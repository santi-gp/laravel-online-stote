@extends('layouts.app')
@section('title', $viewHome['title'])
@section('content')
<div class="flex-row wrap jc-around">
    <img width="153" src="{{ asset('img/matlab.jpg') }}" alt="matlab" />
    <img width="153" src="{{ asset('img/deep_learning.jpg') }}" alt="deep_learning" />
    <img width="153" src="{{ asset('img/python.jpg') }}" alt="python" />
    <img width="153" src="{{ asset('img/data_science.jpg') }}" alt="data_science" />
</div>
@endsection