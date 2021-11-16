@extends('template/layout')

@section('content')
    Order products
    
  @foreach(\App\Models\Order_products::All() as $orderProduct)
    @php  
        dump($orderProduct);
    @endphp
  @endforeach

@stop
