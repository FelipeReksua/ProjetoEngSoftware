@extends('layouts.main')

@section('content')
@extends('layouts.topbar')

@section('content')

  <div id="sidebar">
    <ul class="nav">
    <li>
      <a href="/ranking">
        <i class="zmdi zmdi-view-dashboard"></i> Ranking
      </a>
    </li>
    <li>
      <a href="/ranking/cadastro">
        <i class="zmdi zmdi-link"></i> Adicionar pessoa
      </a>
    </li>
    <li>
      <a href="/ranking/contemplados">
        <i class="zmdi zmdi-widgets"></i> Contemplados
      </a>
    </li>
  </ul>
</div>

  <div class="row" id="geral-content">
   <div class="col-sm-10 offset-sm-1">
      <div>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br />
        @endif
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Telefone</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>

            <tbody>
              @foreach($pessoas as $idx => $pessoa)
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$pessoa->first_name}} {{$pessoa->last_name}}</td>
                  <td>{{$pessoa->cpf}}</td>
                  <td>{{$pessoa->city}}</td>
                  <td>{{$pessoa->state}}</td>
                  <td>{{$pessoa->phone}}</td>
                  <td>
                      <a href="{{ route('ranking.edit', $pessoa->id)}}" class="btn btn-secondary">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="{{ route('ranking.destroy', $pessoa->id)}}" class="btn btn-danger delete">
                        <i class="fas fa-trash"></i>
                      </a>
                      <form action="{{ route('ranking.destroy', $pessoa->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                      </form>
                  </td>
              </tr>
              @endforeach
            </tbody>

          </table>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script>
  $('.delete').on('click', function(ev){
    ev.preventDefault();
    console.log("aqui");

    $.ajax({
      url: '{{ route('ranking.destroy', $pessoa->id)}}',
      type: 'DELETE',
      dataType: 'json',
      error: function (res) {
          Swal({
            type: 'error',
            title: 'Oops...',
            text: 'Ocorreu um erro ao excluir o cadastro.'
          });
          return false;
      },
      success: function (res){
          Swal({
            type: 'info',
            title: 'Excluído!',
            text: 'Cadastro excluído com sucesso.'
          });
      }
    });
  });

</script>
@endsection