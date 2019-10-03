@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Adicionar contato</h1>
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
      <form method="post" action="{{ route('contatos.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">Nome:</label>
              <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"/>
          </div>

          <div class="form-group">
              <label for="last_name">Sobrenome:</label>
              <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"/>
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
          <button type="submit" class="btn btn-primary">Adicionar contato</button>
          <a href="{{ route('contatos.index') }}" class="btn btn-warning">Cancelar</a>
      </form>
  </div>
</div>
</div>
@endsection