<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaProds;

class Productos extends Model
{
    use HasFactory;
    protected $fillable=['categoria_prods_id','nombre','precio','imagen','disponibilidad'];

    public function categoria() {
        //return $this->belongsTo(CategoriaProds::class,'categoria_prods_id');
        return $this->belongsTo('App\Models\CategoriaProds','categoria_prods_id');
    }
}
