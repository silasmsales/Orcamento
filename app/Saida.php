<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
  protected $fillable = ['conta_id', 'despesa_id', 'valor', 'data', 'descricao', 'descricao_detalhada'];

  public function conta()
  {
    return $this->belongsTo('App\Conta', 'conta_id');
  }
  public function despesa()
  {
    return $this->belongsTo('App\Despesa', 'despesa_id');
  }
}
