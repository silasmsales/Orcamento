<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTipoDespesa extends Model
{
  protected $fillable = ['tipo_despesas_id', 'descricao', 'descricao_detalhada'];

  public function tipo()
  {
    return $this->belongsTo('App\TipoDespesa', 'tipo_despesas_id');
  }
  public function despesas()
  {
    return $this->hasMany('App\Despesa', 'sub_tipo_despesa_id');
  }
}
