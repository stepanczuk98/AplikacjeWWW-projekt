@extends('template/layout')
<style>
    table, th, td {
      border: 1px solid black;
    }
</style>
    
@section('content')
    <a href="{{ route('homepage') }}"><button>Powrót</button></a>
    <h2>Edytuj kategorie</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('Category.UpdateCategory', ['id'=> $category->id])}}" method="POST">   
        {{csrf_field()}}
        @method("PUT")
                 
        <th><input type="text" name="category_name" id="category_name" value={{$category->name}}></th>
    
        <input type="submit" value="Edytuj">
    </form>

@endsection
