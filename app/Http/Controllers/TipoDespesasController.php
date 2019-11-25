<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDespesa;

class TipoDespesasController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    $tipo_despesas = TipoDespesa::all();
    return view('tipo_despesas.index', compact('tipo_despesas'));
  }

  public function cadastrar(Request $request)
  {
     TipoDespesa::create($request->all());
     $tipo_despesa = TipoDespesa::all();
     return redirect()->route('tipo_despesas.index');
  }

  public function deletar($id)
  {
    $tipo = TipoDespesa::find($id);
    $tipo->deletarSubTipos();
    $tipo->delete();

    return redirect()->route('tipo_despesas.index');
  }

  public function atualizar(Request $request)
  {
    TipoDespesa::find($request->input('id'))->update($request->all());
    return redirect()->route('tipo_despesas.index');
  }
}
