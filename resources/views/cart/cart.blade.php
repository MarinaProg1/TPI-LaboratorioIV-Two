@extends('layouts.app-new')

@section('content')
    <h1>Carrito de compras</h1>

    @if ($cart->products->isEmpty())
        <p>No hay productos en el carrito.</p>
    @else
        <ul>
            @foreach ($cart->products as $product)
                <li>{{ $product->name }} - ${{ $product->price }}</li>
            @endforeach
        </ul>
    @endif
@endsection
