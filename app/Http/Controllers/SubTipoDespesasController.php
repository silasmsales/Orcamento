<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubTipoDespesa;
use App\TipoDespesa;

class SubTipoDespesasController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    $subtipo_despesas = SubTipoDespesa::all();
    $tipo_despesas = TipoDespesa::all();
    return view('subtipo_despesas.index', compact('subtipo_despesas', 'tipo_despesas'));
  }

  public function cadastrar(Request $request)
  {
     SubTipoDespesa::create($request->all());
     $tipo_contas = SubTipoDespesa::all();
     return redirect()->route('subtipo_despesas.index');
  }

  public function deletar($id)
  {
    SubTipoDespesa::find($id)->delete();
    return redirect()->route('subtipo_despesas.index');
  }

  public function atualizar(Request $request)
  {
    SubTipoDespesa::find($request->input('id'))->update($request->all());
    return redirect()->route('subtipo_despesas.index');
  }
}
