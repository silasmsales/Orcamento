<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubTipoDespesa;
use App\TipoDespesa;
use App\Despesa;
use App\Mes;

class DespesaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $meses = Mes::all();
    $despesas = Despesa::all();
    $tipo_despesas = TipoDespesa::all();
    $subtipo_despesas = SubTipoDespesa::all();

    return view('despesas.index', compact('despesas', 'tipo_despesas', 'subtipo_despesas'));
  }

  public function cadastrar(Request $request)
  {
    $despesa = new Despesa();
    $despesa->tipo_despesa_id = $request->input('tipo_despesa_id');
    $despesa->sub_tipo_despesa_id = $request->input('sub_tipo_despesa_id');
    $despesa->valor = $request->input('valor');
    $despesa->data = $request->input('data');
    $despesa->descricao = $request->input('descricao');
    $despesa->descricao_detalhada = $request->input('descricao_detalhada');
    $despesa->save();

    $despesa->addMeses($request->input('meses'));

    $despesas = Despesa::all();
    return redirect()->route('despesas.index');
  }

  public function deletar($id)
  {
    $despesa = Despesa::find($id);
    $despesa->deletarMeses();
    $despesa->delete();
    return redirect()->route('despesas.index');
  }

  public function atualizar(Request $request)
  {
    $despesa = Despesa::find($request->input('id'));
    $despesa->updateMeses($request->input('meses'));
    $despesa->update($request->all());
    return redirect()->route('despesas.index');
  }
}
