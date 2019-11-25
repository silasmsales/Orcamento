<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoConta;

class TipoContaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $tipo_contas = TipoConta::all();
    return view('tipo_contas.index', compact('tipo_contas'));
  }

  public function cadastrar(Request $request)
  {
     TipoConta::create($request->all());
     $tipo_contas = TipoConta::all();
     return redirect()->route('tipo_contas.index');
  }

  public function deletar($id)
  {
    TipoConta::find($id)->delete();
    return redirect()->route('tipo_contas.index');
  }

  public function atualizar(Request $request)
  {
    TipoConta::find($request->input('id'))->update($request->all());
    return redirect()->route('tipo_contas.index');
  }
}
