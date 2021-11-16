@extends('template/layout')

@section('content')
    Orders
    
  @foreach(\App\Models\Order::All() as $order)
    @php  
        dump($order);
    @endphp
  @endforeach

@stop
