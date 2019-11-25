<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
  protected $fillable = ['mes', 'despesa_id'];
  protected $table = 'meses';

  public function despesa()
  {
    return $this->belongsTo('App\Despesa', 'despesa_id');
  }
}
