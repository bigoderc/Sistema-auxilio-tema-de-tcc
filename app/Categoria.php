<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table ='categoria';
    protected $fillable = ['id', 'nome'];
    // protected $guarded =['CDALUNO'];
    public $timestamps = false;
    // protected $primaryKey = 'CDALUNO';
    public function produto()
    {
        //$this->hasOne(relacao, chave estrangeira, primary key);
        return $this->hasOne('App\Produto', 'categoria', 'id');
         
    }
}
