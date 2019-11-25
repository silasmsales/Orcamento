<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubTipoDespesa;
use App\TipoDespesa;
use App\Despesa;
use App\Conta;
use App\Saida;

class SaidaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $despesas = Despesa::all();
    $tipodespesas = TipoDespesa::all();
    $saidas = Saida::all();
    $contas = Conta::all();

    return view('saidas.index', compact('saidas', 'contas', 'despesas', 'tipodespesas'));
  }
  public function cadastrar(Request $request)
  {
    Saida::create($request->all());
    return redirect()->route('saidas.index');
  }

  public function deletar($id)
  {
    $saidas = Saida::find($id);
    $saidas->delete();
    return redirect()->route('saidas.index');
  }

  public function atualizar(Request $request)
  {
    Saida::find($request->input('id'))->update($request->all());
    return redirect()->route('saidas.index');
  }

}
