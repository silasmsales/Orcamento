@extends('layouts.dashboard')

@section('board')

<script>
$(document).ready(function(){
  $('#editartipodespesas').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var descricao = button.data('descricao') // Extract info from data-* attributes
    var descricao_detalhada = button.data('descricao_detalhada') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Editar '+ id + ' ' + descricao)
    $('#id').val(id)
    $('#descricao').val(descricao)
    $('#descricao_detalhada').val(descricao_detalhada)
  })
});
</script>

<!-- Nova modal tipo conta -->
<div class="modal" tabindex="-1" role="dialog" id="editartipodespesas">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('tipo_despesas.atualizar')}}" method="post">
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
            <label for="descricao">Tipo de despesa</label>
            <input type="text" class="form-control" name="descricao"  id="descricao" placeholder="Descrição do tipo de despesa" value="">
          </div>
          <div class="form-group">
            <label for="descricao_detalhada">Detalhes</label>
            <textarea class="form-control" name="descricao_detalhada" id="descricao_detalhada" rows="3" placeholder="Descrição detalhada do tipo de despesa"></textarea>
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
<!-- .fim modal tipo despesa -->
<!-- Nova modal tipo despesa -->
<div class="modal" tabindex="-1" role="dialog" id="novotipodespesa">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('tipo_despesas.cadastrar')}}" method="post" >
         @csrf
        <div class="modal-header">
        <h5 class="modal-title">Novo tipo de despesa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="descricao">Tipo de despesa</label>
            <input type="text" class="form-control" name="descricao" placeholder="Descrição do subtipo de despesa">
          </div>
          <div class="form-group">
            <label for="descricao_detalhada">Detalhes</label>
            <textarea class="form-control" name="descricao_detalhada" rows="3" placeholder="Descrição detalhada do subtipo de despesa"></textarea>
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
<!-- .fim modal tipo despesa -->


<section class="content-header">
  <h1>
    Tipos de despesas
  </h1>
  <ol class="breadcrumb">
    <li ><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Tipos de despesas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- /.col -->
    <div class="col-md">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">SubTipos de despesas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 30px">#</th>
              <th style="width: 300px">Tipo</th>
              <th>Detalhe</th>
              <th style="width: 150px">Ação</th>
            </tr>
            <tr>
              @foreach ($tipo_despesas as $tipo)

              <td>{{$tipo->id}}</td>
              <td>{{$tipo->descricao}}</td>
              <td>{{$tipo->descricao_detalhada}}</td>
              <td>
                <div class="btn-group">
                  <button data-toggle="modal" data-target="#editartipodespesas" data-id="{{$tipo->id}}" data-descricao="{{$tipo->descricao}}" data-descricao_detalhada="{{$tipo->descricao_detalhada}}" type="button" class="btn btn-info">Editar</button>
                  <a  class="btn btn-danger" href="javascript:confirm('Deletar  {{$tipo->id." - ".$tipo->descricao}}?') ? window.location.href='{{ route('tipo_despesas.deletar', $tipo->id) }}': false">Deletar</a>
                </div>
              </td>
            </tr>

            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <div class="btn-group">
        <button data-toggle="modal" data-target="#novotipodespesa" type="button" class="btn btn-block btn-success">Novo tipo de despesa</button>
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
