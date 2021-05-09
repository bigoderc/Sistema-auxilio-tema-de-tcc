<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Area extends Model
{
    //
    protected $table ='areas';
    protected $fillable = ['id', 'nome','descricao'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
    // // protected $primaryKey = 'CDALUNO'; 
    // protected $with = ['categorias','estoque','fornecedores'];
    // public function categorias(){
    //     return $this->belongsTo('App\Categoria','categoria','id');
    // }
    // public function estoque(){
    // return $this->hasOne('App\Estoque', 'produto');
    // }
    // public function fornecedores(){
    //     return $this->hasOne('App\Fornecedor', 'id','fornecedor');
        
    // }
}
