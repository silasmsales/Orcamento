@extends('layouts.dashboard')

@section('board')

<script>

$(document).ready(function(){

  $('#editarsaidas').on('show.bs.modal', function (event) {
    if(event.namespace === 'bs.modal'){
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      var conta_id = button.data('conta_id') // Extract info from data-* attributes
      var despesa_id = button.data('despesa_id') // Extract info from data-* attributes
      var valor = button.data('valor') // Extract info from data-* attributes
      var data = button.data('data') // Extract info from data-* attributes
      var descricao = button.data('descricao') // Extract info from data-* attributes
      var descricao_detalhada = button.data('descricao_detalhada') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('.modal-title').text('Editar '+ id + ' ' + descricao)
      $('#id').val(id)
      $('#conta_id').val(conta_id).change()
      $('#despesa_id').val(despesa_id).change()
      $('#valor').val(valor)
      $('#data').val(data)
      $('#descricao').val(descricao)
      $('#descricao_detalhada').val(descricao_detalhada)
    }
  });
});

</script>

<!-- Editar modal entrada -->
<div class="modal" tabindex="-1" role="dialog" id="editarsaidas">
  <div class="modal-dialog" role="document">
    <form action="{{route('saidas.atualizar')}}" method="post">
    <div class="modal-content">
         @csrf
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label>Conta</label>
            <select name="conta_id" id="conta_id" class="form-control">
            @foreach ($contas as $conta)
              <option value={{$conta->id}} >{{$conta->descricao}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Despesa</label>
            <select name="despesa_id" id="despesa_id" class="form-control">
            @foreach ($tipodespesas as $tipodespesa)
              @if($tipodespesa->despesas->count() > 0)
              <option disabled >{{strtoupper($tipodespesa->descricao)}}</option>
                @foreach ($tipodespesa->despesas as $despesa)
                  <option value={{$despesa->id}} >{{$despesa->descricao}}</option>
                @endforeach
                <option disabled ></option>
              @endif
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" class="form-control" name="valor"  id="valor" placeholder="Valor" value="">
          </div>
          <div class="form-group">
            <label for="valor">Data</label>
            <input type="date" class="form-control" name="data"  id="data" placeholder="Data" value="">
          </div>
          <div class="form-group">
            <label for="descricao">Descricao</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descrição"></textarea>
          </div>
          <div class="form-group">
            <label for="descricao_detalhada">Detalhes</label>
            <textarea class="form-control" name="descricao_detalhada" id="descricao_detalhada" rows="3" placeholder="Descrição detalhada da despesa"></textarea>
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
<!-- .fim modal editar saida -->
<!-- Nova modal saida -->
<div class="modal" tabindex="-1" role="dialog" id="novosaida">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('entradas.cadastrar')}}" method="post" >
         @csrf
        <div class="modal-header">
        <h5 class="modal-title">Nova saída</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label>Conta</label>
          <select name="conta_id" id="conta_id" class="form-control">
          @foreach ($contas as $conta)
            <option value={{$conta->id}} >{{$conta->descricao}}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="valor">Valor</label>
          <input type="text" class="form-control" name="valor"  id="valor" placeholder="Valor" value="">
        </div>
        <div class="form-group">
          <label for="valor">Data</label>
          <input type="date" class="form-control" name="data"  id="data" placeholder="Data" value="">
        </div>
        <div class="form-group">
          <label for="descricao">Descricao</label>
          <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descrição"></textarea>
        </div>
        <div class="form-group">
          <label for="descricao_detalhada">Detalhes</label>
          <textarea class="form-control" name="descricao_detalhada" id="descricao_detalhada" rows="3" placeholder="Descrição detalhada da despesa"></textarea>
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
<!-- .fim modal subtipo despesa -->


<section class="content-header">
  <h1>
    Saidas
  </h1>
  <ol class="breadcrumb">
    <li ><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Saidas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <!-- /.col -->
    <div class="col-md">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Saidas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 30px">#</th>
              <th style="width: 300px">Conta</th>
              <th>Tipo da despesa</th>
              <th>SubTipo da despesa</th>
              <th>Valor</th>
              <th>Data</th>
              <th>Descrição</th>
              <th style="width: 150px">Ação</th>
            </tr>
            <tr>
              @foreach ($saidas as $saida)

              <td>{{$saida->id}}</td>
              <td>{{$saida->conta->descricao}}</td>
              <td>{{$saida->despesa->tipo->descricao}}</td>
              <td>{{$saida->despesa->subtipo->descricao}}</td>
              <td>{{$saida->valor}}</td>
              <td>{{$saida->data}}</td>
              <td>{{$saida->descricao}}</td>
              <td>
                <div class="btn-group">
                  <button data-toggle="modal" data-target="#editarsaidas" data-id="{{$saida->id}}" data-conta_id="{{$saida->conta_id}}" data-despesa_id="{{$saida->despesa_id}}" data-valor="{{$saida->valor}}" data-data="{{$saida->data}}" data-descricao="{{$saida->descricao}}" data-descricao_detalhada="{{$saida->descricao_detalhada}}" type="button" class="btn btn-info">Editar</button>
                  <a  class="btn btn-danger" href="javascript:confirm('Deletar  {{$saida->id." - ".$saida->descricao}}?') ? window.location.href='{{ route('saidas.deletar', $saida->id) }}': false">Deletar</a>
                </div>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <div class="btn-group">
        <button data-toggle="modal" data-target="#novosaida" type="button" class="btn btn-block btn-success">Nova saída</button>
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
