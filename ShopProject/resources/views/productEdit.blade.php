@extends('template/layout')
<style>
    table, th, td {
      border: 1px solid black;
    }
</style>
    
@section('content')
    <a href="{{ route('homepage') }}"><button>Powrót</button></a>
    <h2>Edytuj produkt</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('Product.UpdateProduct', ['id'=> $product->id])}}" method="POST">   
        {{csrf_field()}}
        @method("PUT")
                 
        <th><input type="text" name="product_name" id="product_name" value={{$product->name}}></th>
        <th><input type="number" step="0.01" min=0 name="price" id="price" value={{$product->price}}></th>
    
        <select name="category" id="category">
            @foreach ($product_categories as $category)
                <option value="{{ $category->id }}" 
                @if ($category->id == $selected_category))
                    selected="selected"
                @endif
                >{{ $category->name }}</option>
            @endforeach
        </select>
    
        <input type="submit" value="Edytuj">
    </form>

@endsection
