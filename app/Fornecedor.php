<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    protected $table ='fornecedor';
    protected $fillable = ['id', 'cnpj','razao_social','fantasia', 'endereco','cidade','numero','uf','cep','telefone','celular','email'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
    // protected $primaryKey = 'CDALUNO'; 
    public function produto(){
        return $this->hasMany('App\Produto', 'fornecedor','id');
    }
}
