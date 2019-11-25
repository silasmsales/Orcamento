@extends('layouts.dashboard')

@section('board')

<script>
$(document).ready(function(){
  $('#editarcontas').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var tipo_conta_id = button.data('tipo_conta_id') // Extract info from data-* attributes
    var descricao = button.data('descricao') // Extract info from data-* attributes
    var saldo = button.data('saldo') // Extract info from data-* attributes
    var descricao_detalhada = button.data('descricao_detalhada') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Editar '+ id + ' ' + descricao)
    $('#id').val(id)
    $('#tipo_conta_id').val(tipo_conta_id)
    $('#descricao').val(descricao)
    $('#saldo').val(saldo)
    $('#descricao_detalhada').val(descricao_detalhada)

    $('#editarcontas select').val(tipo_conta_id).change()

  })
});
</script>

<!-- Editar modal conta -->
<div class="modal" tabindex="-1" role="dialog" id="editarcontas">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('contas.atualizar')}}" method="post">
         @csrf
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <label>Tipo de conta</label>
            <select name="tipo_conta_id" id="tipo_conta_id" class="form-control">
            @foreach ($tipo_contas as $tipo)
              <option value="{{$tipo->id}}" >{{$tipo->descricao}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="text" class="form-control" name="saldo"  id="saldo" placeholder="Saldo da conta" value="">
          </div>
          <div class="form-group">
            <label for="descricao">Conta</label>
            <input type="text" class="form-control" name="descricao"  id="descricao" placeholder="Descrição da conta" value="">
          </div>
          <div class="form-group">
            <label for="descricao_detalhada">Detalhes</label>
            <textarea class="form-control" name="descricao_detalhada" id="descricao_detalhada" rows="3" placeholder="Descrição detalhada da conta"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary"  value="Atualizar" />
      </div>
    </form>
    </div>
  </div>
</div>
<!-- .fim modal  conta -->
<!-- Nova modal conta -->
<div class="modal" tabindex="-1" role="dialog" id="novocontas">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('contas.cadastrar')}}" method="post" >
         @csrf
        <div class="modal-header">
        <h5 class="modal-title">Nova conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Tipo de conta</label>
            <select name="tipo_conta_id" id="tipo_conta_id" class="form-control">
            @foreach ($tipo_contas as $tipo)
              <option value="{{$tipo->id}}" >{{$tipo->descricao}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="text" class="form-control" name="saldo"  id="saldo" placeholder="Saldo da conta" value="">
          </div>
          <div class="form-group">
            <label for="descricao">Conta</label>
            <input type="text" class="form-control" name="descricao" placeholder="Descrição do tipo de conta">
          </div>
          <div class="form-group">
            <label for="descricao_detalhada">Detalhes</label>
            <textarea class="form-control" name="descricao_detalhada" rows="3" placeholder="Descrição detalhada da conta"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary"  value="Cadastrar" />
      </div>
    </form>
    </div>
  </div>
</div>
<!-- .fim modal conta -->

<section class="content-header">
  <h1>
    Contas
  </h1>
  <ol class="breadcrumb">
    <li ><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Contas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- /.col -->
    <div class="col-md">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Contas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 30px">#</th>
              <th style="width: 300px">Conta</th>
              <th style="width: 300px">Saldo</th>
              <th>Detalhe</th>
              <th style="width: 150px">Ação</th>
            </tr>
            <tr>
              @foreach ($contas as $conta)

              <td>{{$conta->id}}</td>
              <td>{{$conta->descricao}}</td>
              <td>{{$conta->saldo}}</td>
              <td>{{$conta->descricao_detalhada}}</td>
              <td>
                <div class="btn-group">
                  <button data-toggle="modal" data-target="#editarcontas" data-id="{{$conta->id}}" data-tipo_conta_id="{{$conta->tipo_conta_id}}" data-descricao="{{$conta->descricao}}" data-saldo="{{$conta->saldo}}" data-descricao_detalhada="{{$conta->descricao_detalhada}}" type="button" class="btn btn-info">Editar</button>
                  <a  class="btn btn-danger" href="javascript:confirm('Deletar  {{$conta->id." - ".$conta->descricao}}?') ? window.location.href='{{ route('contas.deletar', $conta->id) }}': false">Deletar</a>
                </div>
              </td>
            </tr>

            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <div class="btn-group">
        <button data-toggle="modal" data-target="#novocontas" type="button" class="btn btn-block btn-success">Nova conta</button>
      </div>

      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<!-- Modal -->

@endsection
