<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Produto extends Model
{
    //
    protected $table ='produto';
    protected $fillable = ['id', 'nome','categoria', 'codigo_barra','codigo_interno','observacao','curva_abc',
        'valor_unitario','fornecedor','qtde_embalagem'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
    // protected $primaryKey = 'CDALUNO'; 
    protected $with = ['categorias','estoque','fornecedores'];
    public function categorias(){
        return $this->belongsTo('App\Categoria','categoria','id');
    }
    public function estoque(){
    return $this->hasOne('App\Estoque', 'produto');
    }
    public function fornecedores(){
        return $this->hasOne('App\Fornecedor', 'id','fornecedor');
        
    }
}
