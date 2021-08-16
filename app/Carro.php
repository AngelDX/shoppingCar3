<?php
namespace App;

class Carro{
    public $carro;

    public function agregar($producto){
        $this->carro=session()->get('cart');
        //Si el carro esta vacio se agregar un nuevo producto
        if(!$this->carro){
            $this->carro=[
                $producto->id=>[
                    "nombre"=>$producto->nombre,
                    "cantidad"=>1,
                    "precio"=>$producto->precio,
                    "imagen"=>$producto->imagen
                ]
            ];
        //Si el carro existe y el producto tambien, sumamos mas 1 la cantidad
        }else if(isset($this->carro[$producto->id])){
            $this->carro[$producto->id]['cantidad']++;
        }else{ //si el carro existe pero el producto no esta en el carro
            $this->carro[$producto->id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen
            ];
        }
        session()->put('cart',$this->carro);
    }

    public function sumar($id){
        $this->carro=session()->get('cart');
        if(isset($this->carro[$id])){
            $this->carro[$id]['cantidad']++;
        }
        session()->put('cart',$this->carro);
    }

    public function restar($id){
        $this->carro=session()->get('cart');
        if(isset($this->carro[$id])){
            $this->carro[$id]['cantidad']--;
            if ($this->carro[$id]['cantidad']<1) {
                unset($this->carro[$id]);
            }
        }
        session()->put('cart',$this->carro);
    }
}
?>
