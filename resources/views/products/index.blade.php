@extends('layouts.app-new')
@section('content')
    <h1>Lista de productos</h1>
    <a href="{{ route('products.create') }}">Crear producto</a>
    <ul>
        @foreach ($products as $produt)
            <li>{{ $product->name }} - {{ $product->category }} - {{ $product->price }} - {{ $product->stock }}</li>
        @endforeach
    </ul>
@endsection
