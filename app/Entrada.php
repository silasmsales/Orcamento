<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
  protected $fillable = ['conta_id', 'valor', 'data', 'descricao', 'descricao_detalhada'];

  public function conta()
  {
    return $this->belongsTo('App\Conta', 'conta_id');
  }
}
