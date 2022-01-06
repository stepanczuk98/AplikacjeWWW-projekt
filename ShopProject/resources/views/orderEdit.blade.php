@extends('template/layout')
<style>
    table, th, td {
      border: 1px solid black;
    }
</style>
    
@section('content')
    <a href="{{ route('Order.List') }}"><button>Powrót</button></a>
    <h2>Edytuj Zamowienie</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <span>Ustawienie ilości na 0 usuwa produkt z zamówienia.</span>
    <table>
        <thead>
            <tr>
                <th>nazwa</th>
                <th>ilosc</th>
                <th>zmień ilość</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order_products as $or_prod)       
            <tr>
                <td>{{ $or_prod->product_name }}</td>
                <td>{{ $or_prod->quantity }}</td>
                <form method="POST" action="{{ route('Order.EditQuantity', ['id'=> $or_prod->id]) }}">
                    @csrf
                    
                      <th>
                          <input type="number" name="quantity">
                          <input type="submit" value="zmien">
                        </th>
                </form>
            </tr>
            @endforeach
        </tbody>      
    </table>

    <form method="POST" action="{{ route('Order.AddProduct', ['id'=> $order->id]) }}">
        @csrf
        <label for="product_id">Dodaj produkt:</label><br>
        <select name="product_id" id="product_id">
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity">
        <input type="submit" value="dodaj">
    </form>

@endsection