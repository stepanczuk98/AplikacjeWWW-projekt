@extends('template/layout')

@section('content')
    Users
    
  @foreach(\App\Models\User::All() as $user)
    @php  
        dump($user);
    @endphp
  @endforeach

@stop