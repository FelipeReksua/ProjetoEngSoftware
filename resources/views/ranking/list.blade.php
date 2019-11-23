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
        @if(count($pessoas) >= 1)
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Pontuação</th>
                <th scope="col">Nome</th>
                <th scope="col">Renda</th>
                <th scope="col">Cidade/UF</th>
                <th scope="col">Telefone</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>

            <tbody>
              @foreach($pessoas as $idx => $pessoa)
              <tr>
                  <td>{{$loop->iteration}}º</td>
                  <td>{{$pessoa->pontos}}</td>
                  <td>{{$pessoa->first_name}} {{$pessoa->last_name}}</td>
                  <td>R$ {{number_format($pessoa->renda, 2, ',', '.')}}</td>
                  <td>{{$pessoa->city}}/{{$pessoa->state}}</td>
                  <td>{{$pessoa->phone}}</td>
                  <td>

                    <div class="row">
                      <div class="col-md-4 text-right p-0">
                        <a href="{{ route('ranking.edit', $pessoa->id)}}" class="btn btn-secondary">
                          <i class="fas fa-edit"></i>
                        </a>
                      </div>
                      
                      <div class="col-md-4 text-center p-0">
                        <form action="{{ route('ranking.destroy', $pessoa->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger delete" type="submit">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </div>

                      <div class="col-md-4 text-left p-0">
                        <a href="#" class="btn btn-info">
                          <i class="fas fa-gift"></i>
                        </a>
                      </div>

                    </div>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          @else
            <div class="alert alert-info" role="alert">
              <i class="mdi mdi-alert-circle-outline mr-2"></i> Nenhum resultado encontrado!
            </div>
          @endif
      </div>
    </div>
  </div>
@endsection

@section('js')
<script>
  // $('.delete').on('click', function(ev){
  //   ev.preventDefault();
  //   var id = $(this).data('id');
  //   console.log(id);
  //   console.log("here");

  //   $.ajax({
  //     url: '/ranking/' + id,
  //     type: 'DELETE',
  //     dataType: 'json',
  //     error: function (res) {
  //         Swal({
  //           type: 'error',
  //           title: 'Oops...',
  //           text: 'Ocorreu um erro ao excluir o cadastro.'
  //         });
  //         return false;
  //     },
  //     success: function (res){
  //         Swal({
  //           type: 'info',
  //           title: 'Excluído!',
  //           text: 'Cadastro excluído com sucesso.'
  //         });
  //     }
  //   });
  // });

  $('.delete').on('click', function(ev){
    if (!confirm("Tem certeza que deseja excluir esse cadastro?")) {
      ev.preventDefault();
      return;
    }
  });

</script>
@endsection