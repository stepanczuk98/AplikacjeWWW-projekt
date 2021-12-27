@extends('template/layout')

@section('content')
<a href="{{ route('homepage') }}"><button>Powrót</button></a>
<h1>Dodaj produkt:</h1>

<table>
  <thead>
      <tr>
          <th>Nazwa</th>
          <th>Cena</th>
          <th>Kategoria</th>
      </tr>
  </thead>

  <form action="{{ route('Product.AddProduct')}}" method="POST" id="add_product_form">
  @csrf
    <th><input type="text" name="product_name" id="product_name"></th>
    <th><input type="number" step="0.01" min=0 name="price" id="price"></th>
    <th>
      <select name="category" id="category">
        @foreach ($product_categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </th>
    <input type="submit" value="Dodaj produkt">
  </form>
</table>

@endsection
