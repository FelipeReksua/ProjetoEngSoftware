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
   <div class="col-sm-8 offset-sm-1">
      {{-- {{dump(url()->current())}} --}}
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
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>

            <tbody>
              @foreach($pessoas as $idx => $pessoa)
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$pessoa->first_name}} {{$pessoa->last_name}}</td>
                  <td>teste</td>
                  <td>
                      {{-- <a href="{{ route('contatos.edit', $pessoa->id)}}" class="btn btn-primary">Editar</a> --}}
                  </td>
                  <td>
                      {{-- <form action="{{ route('contatos.destroy', $pessoa->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Apagar</button>
                      </form> --}}
                  </td>
              </tr>
              @endforeach
            </tbody>

          </table>
      </div>
    </div>
  </div>
@endsection