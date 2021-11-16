@extends('template/layout')

@section('content')
    Categories
    
  @foreach(\App\Models\Product_categories::All() as $category)
    @php  
        dump($category);
    @endphp
  @endforeach

@stop
