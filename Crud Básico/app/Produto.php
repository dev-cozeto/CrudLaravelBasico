<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //especificar com quais campos da tabela nós vamos trabalhar 
    protected $fillable = ['nome', 'valor', 'estoque'];
}
