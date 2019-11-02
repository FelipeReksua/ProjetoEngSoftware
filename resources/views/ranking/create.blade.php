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
          <form method="post" action="{{ route('ranking.store') }}">
              @csrf
              <div class="form-group">    
                  <label for="first_name">Nome:</label>
                  <input type="text" required class="form-control" name="first_name" value="{{ old('first_name') }}"/>
              </div>

              <div class="form-group">
                  <label for="last_name">Sobrenome:</label>
                  <input type="text" required class="form-control" name="last_name" value="{{ old('last_name') }}"/>
              </div>

              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
              </div>
              <div class="form-group">
                  <label for="city">Cidade:</label>
                  <input type="text" class="form-control" name="city" value="{{ old('city') }}"/>
              </div>
              <div class="form-group">
                  <label for="country">País:</label>
                  <input type="text" class="form-control" name="country" value="{{ old('country') }}"/>
              </div>
              <div class="form-group">
                  <label for="job_title">Profissão:</label>
                  <input type="text" class="form-control" name="job_title" value="{{ old('job_title') }}"/>
              </div>     
              <div class="row">
                <div class="text-left col-md-6">
                  <a href="{{ route('ranking.index') }}" class="btn btn-warning text-left">Cancelar</a>
                </div>                    
                <div class="text-right col-md-6">
                  <button type="submit" class="btn btn-primary">Adicionar contato</button>
                </div>                    
              </div>
          </form>
      </div>
    </div>
  </div>
@endsection