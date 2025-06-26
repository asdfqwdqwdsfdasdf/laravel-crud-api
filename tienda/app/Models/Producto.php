<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    // Especificamos que la clave primaria es 'idproducto'
    protected $primaryKey = 'idproducto';
        // Definir los campos que pueden ser llenados de forma masiva
    protected $fillable = ['nombre', 'precio', 'stock'];
}
