@extends('template/layout')

@section('content')
    Products
    
  @foreach(\App\Models\Product::All() as $product)
    @php  
        dump($product);
    @endphp
  @endforeach

@stop
