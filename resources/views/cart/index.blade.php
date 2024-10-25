@extends('layouts.app-new')

@section('content')
    <h1>Carrito de Compras</h1>

    @if ($cart->products->isEmpty())
        <p>No hay productos en el carrito.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                            <form action="{{ route('cart.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="1" min="1" />
                                <button type="submit" class="btn btn-secondary">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('products.index') }}" class="btn btn-primary">Continuar comprando</a>
@endsection
