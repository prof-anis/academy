@extends('layout.admin')



@section('content')

<h1>Welcome {{Auth::user()->email}}</h1>

@endsection