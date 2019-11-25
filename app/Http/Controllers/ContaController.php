<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\TipoConta;

class ContaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $contas = Conta::all();
    $tipo_contas = TipoConta::all();
    return view('contas.index', compact('contas', 'tipo_contas'));
  }

  public function cadastrar(Request $request)
  {
     Conta::create($request->all());
     $contas = Conta::all();
     return redirect()->route('contas.index');
  }

  public function deletar($id)
  {
    Conta::find($id)->delete();
    return redirect()->route('contas.index');
  }

  public function atualizar(Request $request)
  {
    Conta::find($request->input('id'))->update($request->all());
    return redirect()->route('contas.index');
  }
}
