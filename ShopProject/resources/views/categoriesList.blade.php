@extends('template/layout')
<style>
    table, th, td {
      border: 1px solid black;
    }
</style>
    
@section('content')
    <a href="{{ route('homepage') }}"><button>Powrót</button></a>
    <h2>Dostepne kategorie</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <th>{{ $category->name }}</th>
                    @role('Admin')
                    <th>
                        <form method="POST" action="{{ route('Category.DeleteCategory', ['id'=> $category->id]) }}">
                          @csrf
                            @method('Delete')
                            <input type="submit" value="Usun">
                        </form>
                    </th>
                    <th>
                        <form method="GET" action="{{ route('Category.EditCategory', ['id'=> $category->id]) }}" >
                            <input type="submit" value="Edytuj">
                        </form>
                    </th>
                    @endrole
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links('paginator') }}
@endsection
