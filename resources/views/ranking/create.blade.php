@extends('layouts.main')

@section('js')
<script>
  $(function(){
    $('.mask-money').maskMoney(
      {symbol:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false}
    );
  });
</script>
@endsection

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
              <div class="row mb-4">
                <div class="form-group col-md-12">    
                    <label for="first_name">Nome:</label>
                    <input type="text" required class="form-control" name="first_name" value="{{ old('first_name') }}"/>
                </div>

                <div class="form-group col-md-12">
                    <label for="last_name">Sobrenome:</label>
                    <input type="text" required class="form-control" name="last_name" value="{{ old('last_name') }}"/>
                </div>

                <div class="form-group col-md-8">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
                </div>

                <div class="form-group col-md-4">
                    <label for="renda">Renda:</label>
                    <input type="text" class="form-control mask-money" name="renda" value="{{ old('renda') }}"/>
                </div>

                <div class="form-group col-md-5">
                    <label for="cpf">CPF:</label>
                    <input type="text" required class="form-control" name="cpf" value="{{ old('cpf') }}"/>
                </div>

                <div class="form-group col-md-5">
                    <label for="phone">Telefone:</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"/>
                </div>

                <div class="form-group col-md-2">
                    <label for="childrens">Filhos:</label>
                    <input type="number" required min="0" class="form-control" name="childrens" value="{{ old('childrens') }}"/>
                </div>

                <div class="form-group col-md-3">
                    <label for="state">Estado:</label>
                    <select required class="form-control" name="state">
                      <option value="">-- Selecione --</option>
                      <option value="AC">AC</option>
                      <option value="AL">AL</option>
                      <option value="AP">AP</option>
                      <option value="AM">AM</option>
                      <option value="BA">BA</option>
                      <option value="CE">CE</option>
                      <option value="DF">DF</option>
                      <option value="ES">ES</option>
                      <option value="GO">GO</option>
                      <option value="MA">MA</option>
                      <option value="MT">MT</option>
                      <option value="MS">MS</option>
                      <option value="MG">MG</option>
                      <option value="PA">PA</option>
                      <option value="PB">PB</option>
                      <option value="PR">PR</option>
                      <option value="PE">PE</option>
                      <option value="PI">PI</option>
                      <option value="RJ">RJ</option>
                      <option value="RN">RN</option>
                      <option value="RS">RS</option>
                      <option value="RO">RO</option>
                      <option value="RR">RR</option>
                      <option value="SC">SC</option>
                      <option value="SP">SP</option>
                      <option value="SE">SE</option>
                      <option value="TO">TO</option>
                    </select>
                </div>

                <div class="form-group col-md-9">
                    <label for="city">Cidade:</label>
                    <input type="text" required class="form-control" name="city" value="{{ old('city') }}"/>
                </div>

                <div class="form-group col-md-3">
                    <label for="social_project">Outro projeto social?</label>
                    <select required class="form-control" name="social_project">
                      <option value="Sim">Sim</option>
                      <option value="Não">Não</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="employee">Empregado?</label>
                    <select required class="form-control" name="employee">
                      <option value="Sim">Sim</option>
                      <option value="Não">Não</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="job_title">Profissão:</label>
                    <input type="text" class="form-control" name="job_title" value="{{ old('job_title') }}"/>
                </div>
              </div>     

              <div class="row">
                <div class="text-left col-md-6">
                  <a href="{{ route('ranking.index') }}">
                    <button type="button" class="btn btn-dark text-left">Cancelar</button>
                  </a>
                </div>                    
                <div class="text-right col-md-6">
                  <button type="submit" class="btn btn-primary">Adicionar pessoa</button>
                </div>                    
              </div>

          </form>
      </div>
    </div>
  </div>
@endsection