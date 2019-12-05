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
    <li>
      <a href="/users">
        <i class="zmdi zmdi-widgets"></i> Usuários
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
        @if(count($usuarios) >= 1)
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>

            <tbody>
              @foreach($usuarios as $idx => $usuario)
              <tr>
                  <td>{{$usuario->name}}</td>
                  <td>{{$usuario->email}}</td>
                  <td>

                    <div class="row">
                      <div class="col-md-6 text-right p-0">
                        <a href="{{ route('users.edit', $usuario->id)}}" class="btn btn-secondary">
                          <i class="fas fa-edit"></i>
                        </a>
                      </div>
                      
                      <div class="col-md-6 text-center p-0">
                        <form action="{{ route('users.destroy', $usuario->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger delete" type="submit">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
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

  $('.delete').on('click', function(ev){
    if (!confirm("Tem certeza que deseja excluir esse cadastro?")) {
      ev.preventDefault();
      return;
    }
  });

</script>
@endsection