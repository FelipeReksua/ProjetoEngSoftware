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
        @if(count($contemplados) >= 1)
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Nome</th>
                <th scope="col">Benefício</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

            <tbody>
              @foreach($contemplados as $idx => $contemplado)
              <tr>
                  <td>{{date('d/m/Y', strtotime($contemplado->created_at))}}</td>
                  <td>{{$contemplado->pessoa->first_name}} {{$contemplado->pessoa->last_name}}</td>
                  <td>{{$contemplado->beneficio}}</td>
                  <td>
                    <form action="{{ route('ranking.destroy', $contemplado->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger delete" type="submit">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
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