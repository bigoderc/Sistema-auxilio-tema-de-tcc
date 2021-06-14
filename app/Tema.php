<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table ='tema';
    protected $fillable = ['id', 'nome','descricao','fk_area_id'];
    public $timestamps = false;
    protected $with = ['areas'];
    public function areas(){
        return $this->belongsTo('App\Area','fk_areas_id','id');
    }
}
