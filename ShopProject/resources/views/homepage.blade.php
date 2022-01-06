@extends('template/layout')

@section('content')
    <h1>HOMEPAGE</h1>

    <h3>Produkty:</h3>
    @role('Admin')
    <a href="{{ route('Product.ProductsMain') }}"><button>dodaj produkt</button></a>
    @endrole
    <a href="{{ route('Product.List') }}"><button>lista produktow</button></a>

    <h3>Kategorie:</h3>
    @role('Admin')
    <a href="{{ route('Category.CategoriesMain') }}"><button>dodaj kategorie</button></a>
    @endrole
    <a href="{{ route('Category.List') }}"><button>dostepne kategorie</button></a>

    <h3>Zamówienia:</h3>
    @role('Admin')
    <a href="{{ route('Order.OrdersMain') }}"><button>dodaj zamowienie</button></a>
    @endrole
    <a href="{{ route('Order.List') }}"><button>lista zamowien</button></a>
@stop
