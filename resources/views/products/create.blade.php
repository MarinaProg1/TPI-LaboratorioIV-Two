@extends('layouts.app-new')
@section('content')
    <h1>Crear producto</h1>

    <form action="{{ route('products.create') }}" method="POST">
        @csrf
        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
            name="name" placeholder="Ingrese el nombre del producto"></input>
        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
            name="category" placeholder="Ingrese la categoria del producto"></input>
        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price"
            placeholder="Ingrese el precio del prodcuto"></input>
        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
            name="description" placeholder="Ingrese la descripción del prodcuto"></input>
        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
            name="stock" placeholder="Ingrese el stock del prodcuto"></input>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="submit" class="btn btn-danger">Cancelar</button>
    </form>
@endsection
