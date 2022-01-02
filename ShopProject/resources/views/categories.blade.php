  @foreach(\App\Models\Product_categories::All() as $category)
    @php  
        dump($category);
    @endphp
  @endforeach



@extends('template/layout')
<style>
</style>
@section('content')
  <a href="{{ route('homepage') }}"><button>Powrót</button></a>
  <h1>Utworz nowa kategorie:</h1>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <table>
    <thead>
        <tr>
            <th>Nazwa</th>
        </tr>
    </thead>

    <form action="{{ route('Category.AddCategory')}}" method="POST" id="add_category_form">
    @csrf
      <th><input type="text" name="category_name" id="category_name"></th>
    </table>
    <input type="submit" value="Utworz">
  </form>

@endsection
