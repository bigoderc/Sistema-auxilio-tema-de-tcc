<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table ='professores';
    protected $fillable = ['id', 'nome','matricula','fk_areas_id'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
}
