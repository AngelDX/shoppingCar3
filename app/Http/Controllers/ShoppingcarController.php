<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Carro;

class ShoppingcarController extends Controller{

    public function agregar_producto($id){
        $producto=Productos::find($id);
        $carro=new Carro();
        $carro->agregar($producto);
        /*
        $cart=session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart){
            $cart=[
                $id=>[
                    "nombre"=>$producto->nombre,
                    "cantidad"=>1,
                    "precio"=>$producto->precio,
                    "imagen"=>$producto->imagen
                ]
            ];
        session()->put('cart',$cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['cantidad']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "nombre" => $producto->nombre,
            "cantidad" => 1,
            "precio" => $producto->precio,
            "imagen" => $producto->imagen
        ];
        session()->put('cart', $cart);
        */
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    
    public function sumar($id){
        //$producto=Productos::find($id);
        $carro=new Carro();
        $carro->sumar($id);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function restar($id){
        //$producto=Productos::find($id);
        $carro=new Carro();
        $carro->restar($id);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
