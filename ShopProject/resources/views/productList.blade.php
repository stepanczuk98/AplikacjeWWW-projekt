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
                    <th>
                        <form method="POST" action="{{ route('Product.DeleteProduct', ['id'=> $product->id]) }}">
                          @csrf
                            @method('Delete')
                            <input type="submit" value="Usun">
                        </form>
                    </th>
                    <th>
                        <form method="GET" action="{{ route('Product.EditProduct', ['id'=> $product->id]) }}" >
                            <input type="submit" value="Edytuj">
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
 

@endsection
