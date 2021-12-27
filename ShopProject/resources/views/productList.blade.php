@extends('template/layout')

@section('content')
    Products
    
  @foreach ($products as $product)
    @php  
        dump($product);
    @endphp
  @endforeach

@stop