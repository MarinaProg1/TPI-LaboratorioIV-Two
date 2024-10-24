@extends('layouts.app-new')
@section('content')
    <h1 class="mb-4">Lista de productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Crear producto</a>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $product->image_url ?? 'ruta/a/imagen/default.jpg' }}" class="card-img-top"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Categoría: {{ $product->category->name ?? 'Sin categoría' }}</p>
                        <p class="card-text">Precio: ${{ $product->price }}</p>
                        <p class="card-text">Stock: {{ $product->stock }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
