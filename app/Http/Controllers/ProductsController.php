<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    //
    public function index()
    {
        $products=Product::All();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all(); // Obtén todas las categorías
        return view('products.create', compact('categories')); // Pasa las categorías a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name', // Validación única para el nombre
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ], [
            'name.required' => 'El nombre del producto es obligatorio.',
            'name.unique' => 'El nombre del producto ya existe. Por favor, elige otro nombre.',
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.exists' => 'La categoría seleccionada no es válida.',
            'description.required' => 'La descripción es obligatoria.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.numeric' => 'El stock debe ser un número.',
        ]);


        // Guardar el producto en la base de datos
        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
