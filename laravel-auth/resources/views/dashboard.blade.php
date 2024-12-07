@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}!</p>
    </div>
@endsection
