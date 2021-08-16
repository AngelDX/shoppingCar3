<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\CategoriaProds;

class Categoriaprod extends Component{
    public $categorias,$nombre,$categoria_id;
    public $isOpen = 0;

    public function render(){
        $this->categorias=CategoriaProds::all();
        return view('livewire.categoriaprod');
    }

    public function create(){
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->categoria_id = '';
    }

    public function store(){
        $this->validate([
            'nombre' => 'required',
        ]);
        CategoriaProds::updateOrCreate(['id' => $this->categoria_id], [
            'nombre' => $this->nombre,
        ]);
        session()->flash('message', 
            $this->categoria_id ? 'Registro actualizado satisfactoriamente' : 'Registro Creado Satisfactoriamente.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id){
        $categoria = CategoriaProds::findOrFail($id);
        $this->categoria_id = $id;
        $this->nombre = $categoria->nombre;
        $this->openModal();
    }

    public function delete($id){
        CategoriaProds::find($id)->delete();
        session()->flash('message', 'Registro Elimnado Satisfactoriamente.');
    }
}
