<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDespesa extends Model
{
  protected $fillable = ['descricao', 'descricao_detalhada'];

  public function subtipos()
  {
    return $this->hasMany('App\SubTipoDespesa', 'tipo_despesas_id');
  }
  public function despesas()
  {
    return $this->hasMany('App\Despesa', 'tipo_despesa_id');
  }
  public function deletarSubTipos()
  {
    foreach ($this->subtipos as $subtipo) {
      $subtipo->delete();
    }
    return true;
  }
}
