<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;

class CategoriaProds extends Model
{
    use HasFactory;
    protected $fillable=['nombre'];
    
    public function productos(){
        return $this->hasMany(productos::class);
    }
}
