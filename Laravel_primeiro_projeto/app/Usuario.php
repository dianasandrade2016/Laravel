<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['id','nome', 'sobrenome', 'email', 'senha'];
    //protected $fillable = ['nome', 'email'];
}