<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Aqui es donde dice cual tabla quiere como modelo
    protected $table = "posts";


    //esto es un filtro de como quiere almanecer sus datos
    protected function title(): Attribute
    {
        return Attribute::make(
            //y esto es que cada vez que se crea un title transforma todos las letras en minuscula (MUTADORES)
            set: function ($value) {
                return strtolower($value);
            },
            //y esto es para que el title cuando se utilice el get la primera letra este en mayuscula (ACCESORES)
            get: function ($value) {
                return ucfirst($value);
            }
        );
    }
}
