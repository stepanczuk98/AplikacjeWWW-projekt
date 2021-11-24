@extends('template/layout')

@section('content')
<a href="{{ route('homepage') }}"><button>Powrót</button></a>
<h1>dodaj zamówienie:</h1>

<select name="product" id="product">
    @foreach ($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
    @endforeach
</select>
<input type="number" name="quantity" id="quantity">
<button id="add_product">Dodaj do zamowienia</button>

<h3>dodane produkty:</h3>
<table>
    <thead>
        <tr>
            <th>produkt</th>
            <th>ilosc</th>
        </tr>
    </thead>
    <tbody id="tablebody">

    </tbody>
</table>
<form action="{{ route('Order.AddOrder')}}" method="POST" id="add_order_form">
@csrf
    <div id="inputs">

    </div>
    <input type="submit" value="dodaj zamowienie">
</form>

<script>
$( "#add_product" ).on( "click", function() {
    $( "#tablebody" ).append("<tr><td>"+ $( "#product option:selected" ).text() +"</td><td>"+ $( "#quantity" ).val() +"</td></tr>");
    $( "#inputs" ).append('<input type="hidden" name="id[]" value="'+ $( "#product" ).val() +'">');
    $( "#inputs" ).append('<input type="hidden" name="quantity[]" value="'+ $( "#quantity" ).val() +'">');
});

</script>

@endsection