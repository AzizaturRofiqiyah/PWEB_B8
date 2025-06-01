@extends('layouts.app')

@section('title','Schoolarmate')

@section('content')
<p>{{ Auth::user()->name }}</p>
<p>{{ Auth::user()->role }}</p>

@endsection
