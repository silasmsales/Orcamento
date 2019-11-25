<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
  protected $fillable = ['tipo_conta_id', 'saldo', 'descricao', 'descricao_detalhada'];

  public function tipo()
  {
    return $this->belongsTo('App\TipoConta', 'tipo_conta_id');
  }
  public function entradas()
  {
    return $this->hasMany('App\Entrada', 'conta_id');
  }
  public function saidas()
  {
    return $this->hasMany('App\Saida', 'conta_id');
  }
}
