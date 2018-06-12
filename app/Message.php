<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //Proteccion para carga masiva de datos en el modelo
    protected $fillable = ['nombre','email','mensaje'];
}
