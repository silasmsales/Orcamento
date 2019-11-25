<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
  protected $fillable = ['tipo_despesa_id','sub_tipo_despesa_id', 'valor', 'data', 'descricao', 'descricao_detalhada'];

  public function tipo()
  {
    return $this->belongsTo('App\TipoDespesa', 'tipo_despesa_id');
  }
  public function subtipo()
  {
    return $this->belongsTo('App\SubTipoDespesa', 'sub_tipo_despesa_id');
  }
  public function saidas()
  {
    return $this->hasMany('App\Saida', 'despesa_id');
  }
  public function meses()
  {
    return $this->hasMany('App\Mes', 'despesa_id');
  }
  public function addMeses( $meses )
  {
    if($meses != null)
    foreach ($meses as $mes) {
      $this->meses()->save(new Mes(['mes' => $mes]));
    }
    return true;
  }
  public function updateMeses( $meses )
  {
    $this->deletarMeses();
    $this->addMeses($meses);
    return true;
  }
  public function deletarMeses()
  {
    foreach ($this->meses as $mes) {
      $mes->delete();
    }
    return true;
  }
}
