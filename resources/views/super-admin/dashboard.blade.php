@extends('layouts.app')

@section('title','Schoolarmate')

@section('content')
<p>Hlo {{ Auth::user()->name }}</p>
<p>Hlo {{ Auth::user()->role }}</p>

@endsection
