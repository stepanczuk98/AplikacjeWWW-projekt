@extends('template/layout')

@section('content')
    <h1>HOMEPAGE</h1>

    <h3>Zamówienia:</h3>
  <a href="{{ route('Order.OrdersMain') }}"><button>dodaj zamowienie</button></a>
  <a href="{{ route('Order.List') }}"><button>lista zamowien</button></a>
@stop
