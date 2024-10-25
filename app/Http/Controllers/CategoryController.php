<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::All();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:30|unique:categories,name',
        ],[
            'name.unique' => 'Esa categoria ya existe. Por favor, elige otro nombre.',
        ]);
        Category::create($request->all()); // Cambiado a Category

        // Guardar la categoría en la base de datos

    return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente.');
    }
       
   
}
