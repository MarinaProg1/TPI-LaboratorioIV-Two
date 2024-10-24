@extends('layouts.app-new')

@section('content')
    <h1>Crear producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre del producto" required>

        <select name="category_id" class="form-control" required>
            <option value="">Seleccione una categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <input type="text" class="form-control" name="price" placeholder="Ingrese el precio del producto" required>
        <input type="text" class="form-control" name="description" placeholder="Ingrese la descripción del producto"
            required>
        <input type="number" class="form-control" name="stock" placeholder="Ingrese el stock del producto" required>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
