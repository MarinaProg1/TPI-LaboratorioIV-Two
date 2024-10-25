@extends('layouts.app-new')

@section('content')
    <h1>Crear categoría</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre de la categoría</label>
            <input type="text" id="name" class="form-control" name="name"
                placeholder="Ingrese el nombre de la categoría" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancelar</a>
    </form>

    @if ($errors->any())
        <!-- Mostrar errores de validación -->
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
