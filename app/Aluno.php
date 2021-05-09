<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    //
    protected $table ='alunos';
    protected $fillable = ['id', 'nome','matricula'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
     
    
}
