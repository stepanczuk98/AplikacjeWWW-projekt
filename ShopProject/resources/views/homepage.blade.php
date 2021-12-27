@extends('template/layout')

@section('content')
    <h1>HOMEPAGE</h1>

    <h3>Produkty:</h3>
    <a href="{{ route('Product.ProductsMain') }}"><button>dodaj produkt</button></a>
    <a href="{{ route('Product.List') }}"><button>lista produktow</button></a>

    <h3>Zamówienia:</h3>
    <a href="{{ route('Order.OrdersMain') }}"><button>dodaj zamowienie</button></a>
    <a href="{{ route('Order.List') }}"><button>lista zamowien</button></a>
@stop
