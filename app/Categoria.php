<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected  $table='categoria';
    protected  $primaryKey='idcategoria';
     
     protected $fillable = [
        'nombre','descripcion', 'condicion', 
    ];
     
      protected $guarded = [
        
    ];
}
