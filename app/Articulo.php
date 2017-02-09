<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected  $table='articulo';
    public $timestamps=false;
    protected  $primaryKey='idarticulo';
     
     protected $fillable = [
        'idcategoria',
        'codigo',
        'nombre', 
        'stock',
        'descripcion',
        'imagen', 
        'estado'
    ];
     
      protected $guarded = [
        
    ];
}
