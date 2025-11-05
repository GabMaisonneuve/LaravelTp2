@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
</div>
@endsection