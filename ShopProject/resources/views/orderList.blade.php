@extends('template/layout')

<style>

table, th, td {
  border: 1px solid black;
}
</style>

@section('content')

<a href="{{ route('homepage') }}"><button>Powrót</button></a>
<h2>Lista Zamówień</h2>

<span>Filtr:</span>
<form action="{{ route('Order.Filter')}}" method="post">
    @csrf
    <select name="filter" id="filter">
    @foreach ($products as $product)
        <option value="{{$product->name}}">{{$product->name}}</option>
    @endforeach
    </select>
    <input type="submit" value="Filtruj">
</form>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Produkty</th>
            <th>cena całkowita</th>
            <th>data zamowienia</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <th>{{ $order->id }}</th>
                <th> 
                    @foreach ($order_products as $product)
                        @if ($order->id == $product->order_id)
                        <span>Nazwa: {{ $product->product_name }} </span><br>
                        <span>Ilość: {{ $product->quantity }}</span><br>
                        <span>cena: {{ $product->product_price }}zł</span><br>
                        @endif
                    @endforeach

                </th>
                <th>{{ $order->total_price }}zł</th>
                <th>{{ $order->created_at }}</th>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $orders->links('paginator') }}

@endsection