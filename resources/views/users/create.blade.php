@extends('layouts.main')

@section('js')
<script>
  $(function(){
    $('.mask-cpf').mask('000.000.000-00', {reverse: true});
    $(".mask-phone").mask("(00) 0000-00009");
  });
</script>
@endsection

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
          <form method="post" action="{{ route('users.update', $usuario->id) }}">
              @method('PATCH')
              @csrf
              <div class="row mb-4">
                <div class="form-group col-md-12">    
                    <label for="name">Nome:</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label for="email">E-mail:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                  <label for="email">Senha:</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group col-md-12">
                  <label for="email">Repita a senha:</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

              </div>     

              <div class="row">
                <div class="text-left col-md-6">
                  <a href="{{ route('ranking.index') }}">
                    <button type="button" class="btn btn-dark text-left">Cancelar</button>
                  </a>
                </div>                    
                <div class="text-right col-md-6">
                  <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </div>                    
              </div>

          </form>
      </div>
    </div>
  </div>
@endsection