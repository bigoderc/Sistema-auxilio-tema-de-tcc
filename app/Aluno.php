<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    //
    protected $table ='alunos';
    protected $fillable = ['id', 'nome','matricula','cpf','periodo','turma'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
     
    
}
