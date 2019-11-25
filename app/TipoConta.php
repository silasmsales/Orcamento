<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoConta extends Model
{
  protected $fillable = ['descricao', 'descricao_detalhada'];

  public function contas()
  {
    return $this->hasMany('App\Conta', 'tipo_conta_id');
  }
}
