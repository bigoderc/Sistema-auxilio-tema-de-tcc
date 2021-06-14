<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Area extends Model
{
    //
    protected $table ='areas';
    protected $fillable = ['id', 'nome','descricao'];
    public $timestamps = false;
   
}
