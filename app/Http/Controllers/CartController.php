<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{

    public function index()
{
    // Obtener el carrito activo del usuario autenticado
    $cart = Cart::where('user_id', Auth::id())
                ->where('status', 'active')
                ->with('products')
                ->first();

    // Si no hay carrito, creamos uno vacío
    if (!$cart) {
        $cart = new Cart();
        $cart->products = collect(); // Creamos una colección vacía
    }

    return view('cart.index', compact('cart'));
}

public function add(Request $request, $productId)
{
    // Obtener el producto
    $product = Product::findOrFail($productId);

    // Obtener o crear el carrito para el usuario
    $cart = Cart::firstOrCreate([
        'user_id' => Auth::id(),
        'status' => 'active'
    ]);

    // Verificar si el producto ya está en el carrito
    if ($cart->products()->where('id', $product->id)->exists()) {
        // Si ya existe, podrías optar por aumentar la cantidad
        return redirect()->route('cart.index')->with('info', 'El producto ya está en el carrito.');
    }

    // Agregar el producto al carrito
    $cart->products()->attach($product->id, ['quantity' => 1]); // Puedes ajustar la cantidad inicial

    return redirect()->route('products.index')->with('success', 'Producto agregado al carrito.');
}

public function update(Request $request, $productId)
{
    // Validar la entrada
    $request->validate([
        'quantity' => 'required|numeric|min:1',
    ]);

    // Obtener el carrito activo del usuario
    $cart = Cart::where('user_id', Auth::id())->where('status', 'active')->first();

    if ($cart) {
        // Verificar si el producto ya está en el carrito
        if ($cart->products()->where('id', $productId)->exists()) {
            // Actualizar la cantidad del producto en el carrito
            $cart->products()->updateExistingPivot($productId, [
                'quantity' => $request->quantity,
            ]);
        } else {
            return redirect()->route('cart.index')->with('error', 'El producto no está en el carrito.');
        }
    } else {
        return redirect()->route('cart.index')->with('error', 'No hay carrito activo.');
    }

    return redirect()->route('cart.index')->with('success', 'Cantidad actualizada.');
}

 
}
