<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table ='estoque';
    protected $fillable = ['id', 'produto','unidade', 'ultima_saida','ultima_entrada'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
    // protected $primaryKey = 'CDALUNO'; 
}
