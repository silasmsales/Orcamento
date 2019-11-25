<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubTipoDespesa;
use App\TipoDespesa;
use App\Despesa;
use App\Entrada;
use App\Conta;
use App\Mes;

class EntradaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $contas = Conta::all();
    $entradas = Entrada::all();
    $despesas = Despesa::all();
    $tipo_despesas = TipoDespesa::all();
    $subtipo_despesas = SubTipoDespesa::all();

    return view('entradas.index', compact('entradas', 'contas'));
  }
  public function cadastrar(Request $request)
  {
    Entrada::create($request->all());
    return redirect()->route('entradas.index');
  }

  public function deletar($id)
  {
    $entrada = Entrada::find($id);
    $entrada->delete();
    return redirect()->route('entradas.index');
  }

  public function atualizar(Request $request)
  {
    Entrada::find($request->input('id'))->update($request->all());
    return redirect()->route('entradas.index');
  }

}
