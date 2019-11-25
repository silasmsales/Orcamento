@extends('layouts.dashboard')

@section('board')

<script>
$(document).ready(function(){
  var tipos = new Array({{$tipo_despesas->count()}})
@foreach ($tipo_despesas as $tipo_despesa)
  tipos[{{$tipo_despesa->id}}] = { @foreach ($tipo_despesa->subtipos as $subtipo) "{{$subtipo->id}}":"{{$subtipo->descricao}}", @endforeach
}
@endforeach

  $('#editardespesas').on('show.bs.modal', function (event) {
    if(event.namespace === 'bs.modal'){
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      var tipo_despesa_id = button.data('tipo_despesa_id') // Extract info from data-* attributes
      var sub_tipo_despesa_id = button.data('sub_tipo_despesa_id') // Extract info from data-* attributes
      var valor = button.data('valor') // Extract info from data-* attributes
      var data = button.data('data') // Extract info from data-* attributes
      var descricao = button.data('descricao') // Extract info from data-* attributes
      var descricao_detalhada = button.data('descricao_detalhada') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Editar '+ id + ' ' + descricao)
      $('#id').val(id)
      $('#valor').val(valor)
      $('#descricao').val(descricao)
      $('#descricao_detalhada').val(descricao_detalhada)
      $('#tipo_despesa_id').val(tipo_despesa_id).change()

      var meses = new Array({{$despesas->count()}})
@foreach ($despesas as $despesa)
      meses[{{$despesa->id}}] = new Array({{$despesa->meses->count()}})
@foreach ($despesa->meses as $mes)
      meses[{{$despesa->id}}][{{$mes->mes}}] = "{{$mes->mes}}"
@endforeach
@endforeach

      $('#meses').val(meses[id])

      var tipos = new Array({{$tipo_despesas->count()}})
    @foreach ($tipo_despesas as $tipo_despesa)
      tipos[{{$tipo_despesa->id}}] = { @foreach ($tipo_despesa->subtipos as $subtipo) "{{$subtipo->id}}":"{{$subtipo->descricao}}", @endforeach
    }
    @endforeach

    $('#sub_tipo_despesa_id').empty();
    $.each(tipos[tipo_despesa_id], function(key, value) {
          $('#sub_tipo_despesa_id').append($('<option>', { value : key }).text(value));
    });
    $('#sub_tipo_despesa_id').val(sub_tipo_despesa_id).change()

    }
  });

  $(".tipo_despesa_id").change(function(){
    tipo_despesa_id = $(".tipo_despesa_id:visible").val()
    $('.sub_tipo_despesa_id:visible').empty();
    $.each(tipos[tipo_despesa_id], function(key, value) {
          $('.sub_tipo_despesa_id:visible').append($('<option>', { value : key }).text(value));
    });
    $('.sub_tipo_despesa_id:visible').val(sub_tipo_despesa_id).change()
  })

});


</script>

<!-- Editar modal tipo conta -->
<div class="modal" tabindex="-1" role="dialog" id="editardespesas">
  <div class="modal-dialog" role="document">
    <form action="{{route('despesas.atualizar')}}" method="post">
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
            <label>Tipo de despesa</label>
            <select name="tipo_despesa_id" id="tipo_despesa_id" class="form-control tipo_despesa_id">
            @foreach ($tipo_despesas as $tipo_despesa)
              <option value={{$tipo_despesa->id}} >{{$tipo_despesa->descricao}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>SubTipo de despesa</label>
            <select name="sub_tipo_despesa_id" id="sub_tipo_despesa_id" class="form-control sub_tipo_despesa_id">
            </select>
          </div>
          <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" class="form-control" name="valor"  id="valor" placeholder="Valor" value="">
          </div>
          <!-- Select multiple-->
          <div class="form-group">
            <label>Meses</label>
            <select name="meses[]" id="meses" size="12" multiple class="form-control">
              <option value="1">Janeiro</option>
              <option value="2">Fevereiro</option>
              <option value="3">Março</option>
              <option value="4">Abril</option>
              <option value="5">Maio</option>
              <option value="6">Junho</option>
              <option value="7">Julho</option>
              <option value="8">Agosto</option>
              <option value="9">Setembro</option>
              <option value="10">Outubro</option>
              <option value="11">Novembro</option>
              <option value="12">Dezembro</option>
            </select>
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
<!-- .fim modal editar subtipo -->
<!-- Nova modal subtipo despesa -->
<div class="modal" tabindex="-1" role="dialog" id="novodespesa">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('despesas.cadastrar')}}" method="post" >
         @csrf
        <div class="modal-header">
        <h5 class="modal-title">Nova despesa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tipo de despesa</label>
          <select name="tipo_despesa_id" id="tipo_despesa_id" class="form-control tipo_despesa_id">
          @foreach ($tipo_despesas as $tipo_despesa)
            <option value={{$tipo_despesa->id}} >{{$tipo_despesa->descricao}}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>SubTipo de despesa</label>
          <select name="sub_tipo_despesa_id" id="sub_tipo_despesa_id" class="form-control sub_tipo_despesa_id">
          </select>
        </div>
        <div class="form-group">
          <label for="valor">Valor</label>
          <input type="text" class="form-control" name="valor" placeholder="Valor despesa">
        </div>
          <div class="form-group">
          <label>Meses</label>
          <select name="meses[]" size="12" multiple class="form-control">
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
          </select>
        </div>

        <div class="form-group">
          <label for="descricao">Descricao</label>
          <textarea class="form-control" name="descricao" rows="3" placeholder="Descrição"></textarea>
        </div>
        <div class="form-group">
          <label for="descricao_detalhada">Detalhes</label>
          <textarea class="form-control" name="descricao_detalhada" rows="3" placeholder="Descrição detalhada da despesa"></textarea>
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
    Despesas
  </h1>
  <ol class="breadcrumb">
    <li ><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Despesas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- /.col -->
    <div class="col-md">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Despesas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 30px">#</th>
              <th style="width: 300px">Valor</th>
              <th>Tipo</th>
              <th>SubTipo</th>
              <th style="width: 150px">Ação</th>
            </tr>
            <tr>
              @foreach ($despesas as $despesa)

              <td>{{$despesa->id}}</td>
              <td>{{$despesa->valor}}</td>
              <td>{{$despesa->tipo->descricao}}</td>
              <td>@if ($despesa->subtipo != null){{$despesa->subtipo->descricao}} @endif</td>
              <td>
                <div class="btn-group">
                  <button data-toggle="modal" data-target="#editardespesas" data-id="{{$despesa->id}}" data-tipo_despesa_id="{{$despesa->tipo_despesa_id}}" data-sub_tipo_despesa_id="{{$despesa->sub_tipo_despesa_id}}" data-valor="{{$despesa->valor}}" data-data="{{$despesa->data}}" data-descricao="{{$despesa->descricao}}" data-descricao_detalhada="{{$despesa->descricao_detalhada}}" type="button" class="btn btn-info">Editar</button>
                  <a  class="btn btn-danger" href="javascript:confirm('Deletar  {{$despesa->id." - ".$despesa->descricao}}?') ? window.location.href='{{ route('despesas.deletar', $despesa->id) }}': false">Deletar</a>
                </div>
              </td>
            </tr>

            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <div class="btn-group">
        <button data-toggle="modal" data-target="#novodespesa" type="button" class="btn btn-block btn-success">Nova despesa</button>
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
