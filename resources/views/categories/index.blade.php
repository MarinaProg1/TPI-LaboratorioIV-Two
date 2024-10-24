@extends('layouts.app-new')
@section('content')
    <h1>Categorias</h1>
    <a href="{{ route('categories.create') }}">Crear categorias</a>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
@endsection
