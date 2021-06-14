<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table ='projetos';
    protected $fillable = ['id', 'nome','matricula','fk_areas_id'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
    protected $with = ['areas'];
    public function areas(){
        return $this->belongsTo('App\Area','fk_areas_id','id');
    }
}
