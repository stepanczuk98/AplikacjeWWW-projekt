@extends('template/layout')
<style>
    table, th, td {
      border: 1px solid black;
    }
</style>
    
@section('content')
    <a href="{{ route('homepage') }}"><button>Powrót</button></a>
    <h2>Lista produktow</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Cena za sztuke</th>
                <th>Kategoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th>{{ $product->id }}</th>
                    <th>{{ $product->name }}</th>
                    <th>{{ $product->price }}</th>
                    <th>{{ $product->product_category }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
 

@endsection
