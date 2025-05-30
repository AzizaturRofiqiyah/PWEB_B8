@extends('layouts.app')

@section('title','Schoolarmate')

@section('content')
<p>Hlo {{ Auth::user()->name }}</p>

@endsection
