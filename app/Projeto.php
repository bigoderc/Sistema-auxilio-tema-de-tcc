<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table ='projetos';
    protected $fillable = ['id', 'nome','matricula','fk_area_id','arquivo','fk_professor_id','data','descricao'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
    protected $with = ['areas','professor'];
    public function areas(){
        return $this->belongsTo('App\Area','fk_area_id','id');
    }
    public function professor(){
        return $this->belongsTo('App\Professor','fk_professor_id','id');
    }
}
