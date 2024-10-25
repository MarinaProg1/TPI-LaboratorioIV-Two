@extends('layouts.app-new')

@section('content')
    <div class="container mt-4">
        <h1>{{ $product->name }}</h1>

        <div class="card mb-4">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $product->image_url ?? 'ruta/a/imagen/default.jpg' }}" alt="{{ $product->name }}"
                        class="card-img img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p><strong>Categoría:</strong> {{ $product->category->name ?? 'Sin categoría' }}</p>
                        <p><strong>Descripción:</strong> {{ $product->description }}</p>
                        <p><strong>Precio:</strong> ${{ $product->price }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-shopping-cart"></i> Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-warning">
            <i class="fas fa-arrow-left" style="color: black;"></i> Volver atrás
        </a>
    </div>
@endsection
