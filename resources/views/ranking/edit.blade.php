@extends('layouts.main')

@section('js')
<script>
  $(function(){
    $('.mask-money').maskMoney(
      {symbol:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false}
    );
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
          <form method="post" action="{{ route('ranking.update', $pessoa->id) }}">
              @method('PATCH')
              @csrf
              <div class="row mb-4">
                <div class="form-group col-md-12">    
                    <label for="first_name">Nome:</label>
                    <input type="text" required class="form-control" name="first_name" value="{{ old('first_name', $pessoa->first_name) }}"/>
                </div>

                <div class="form-group col-md-12">
                    <label for="last_name">Sobrenome:</label>
                    <input type="text" required class="form-control" name="last_name" value="{{ old('last_name', $pessoa->last_name) }}"/>
                </div>

                <div class="form-group col-md-8">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $pessoa->email) }}"/>
                </div>

                <div class="form-group col-md-4">
                    <label for="renda">Renda:</label>
                    <input type="text" class="form-control mask-money" name="renda" value="{{ number_format(old('renda', $pessoa->renda), 2, ',', '.') }}"/>
                </div>

                <div class="form-group col-md-5">
                    <label for="cpf">CPF:</label>
                    <input type="text" required class="form-control mask-cpf" name="cpf" value="{{ old('cpf', $pessoa->cpf) }}"/>
                </div>

                <div class="form-group col-md-5">
                    <label for="phone">Telefone:</label>
                    <input type="text" class="form-control mask-phone" name="phone" value="{{ old('phone', $pessoa->phone) }}"/>
                </div>

                <div class="form-group col-md-2">
                    <label for="childrens">Filhos:</label>
                    <input type="number" required min="0" class="form-control" name="childrens" value="{{ old('childrens', $pessoa->childrens) }}"/>
                </div>

                <div class="form-group col-md-3">
                    <label for="state">Estado:</label>
                    <select required class="form-control" name="state">
                      <option value="">-- Selecione --</option>
                      <option value="AC" @if(old('state') == 'AC' || $pessoa->state == 'AC') selected @endif>AC</option>
                      <option value="AL" @if(old('state') == 'AL' || $pessoa->state == 'AL') selected @endif>AL</option>
                      <option value="AP" @if(old('state') == 'AP' || $pessoa->state == 'AP') selected @endif>AP</option>
                      <option value="AM" @if(old('state') == 'AM' || $pessoa->state == 'AM') selected @endif>AM</option>
                      <option value="BA" @if(old('state') == 'BA' || $pessoa->state == 'BA') selected @endif>BA</option>
                      <option value="CE" @if(old('state') == 'CE' || $pessoa->state == 'CE') selected @endif>CE</option>
                      <option value="DF" @if(old('state') == 'DF' || $pessoa->state == 'DF') selected @endif>DF</option>
                      <option value="ES" @if(old('state') == 'ES' || $pessoa->state == 'ES') selected @endif>ES</option>
                      <option value="GO" @if(old('state') == 'GO' || $pessoa->state == 'GO') selected @endif>GO</option>
                      <option value="MA" @if(old('state') == 'MA' || $pessoa->state == 'MA') selected @endif>MA</option>
                      <option value="MT" @if(old('state') == 'MT' || $pessoa->state == 'MT') selected @endif>MT</option>
                      <option value="MS" @if(old('state') == 'MS' || $pessoa->state == 'MS') selected @endif>MS</option>
                      <option value="MG" @if(old('state') == 'MG' || $pessoa->state == 'MG') selected @endif>MG</option>
                      <option value="PA" @if(old('state') == 'PA' || $pessoa->state == 'PA') selected @endif>PA</option>
                      <option value="PB" @if(old('state') == 'PB' || $pessoa->state == 'PB') selected @endif>PB</option>
                      <option value="PR" @if(old('state') == 'PR' || $pessoa->state == 'PR') selected @endif>PR</option>
                      <option value="PE" @if(old('state') == 'PE' || $pessoa->state == 'PE') selected @endif>PE</option>
                      <option value="PI" @if(old('state') == 'PI' || $pessoa->state == 'PI') selected @endif>PI</option>
                      <option value="RJ" @if(old('state') == 'RJ' || $pessoa->state == 'RJ') selected @endif>RJ</option>
                      <option value="RN" @if(old('state') == 'RN' || $pessoa->state == 'RN') selected @endif>RN</option>
                      <option value="RS" @if(old('state') == 'RS' || $pessoa->state == 'RS') selected @endif>RS</option>
                      <option value="RO" @if(old('state') == 'RO' || $pessoa->state == 'RO') selected @endif>RO</option>
                      <option value="RR" @if(old('state') == 'RR' || $pessoa->state == 'RR') selected @endif>RR</option>
                      <option value="SC" @if(old('state') == 'SC' || $pessoa->state == 'SC') selected @endif>SC</option>
                      <option value="SP" @if(old('state') == 'SP' || $pessoa->state == 'SP') selected @endif>SP</option>
                      <option value="SE" @if(old('state') == 'SE' || $pessoa->state == 'SE') selected @endif>SE</option>
                      <option value="TO" @if(old('state') == 'TO' || $pessoa->state == 'TO') selected @endif>TO</option>
                    </select>
                </div>

                <div class="form-group col-md-9">
                    <label for="city">Cidade:</label>
                    <input type="text" required class="form-control" name="city" value="{{ old('city', $pessoa->city) }}"/>
                </div>

                <div class="form-group col-md-3">
                    <label for="social_project">Outro projeto social?</label>
                    <select required class="form-control" name="social_project">
                      <option value="Sim" @if(old('social_project') == 'Sim' || $pessoa->social_project == 'Sim') selected @endif>
                        Sim
                      </option>
                      <option value="Não" @if(old('social_project') == 'Não' || $pessoa->social_project == 'Não') selected @endif>
                        Não
                      </option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="employee">Empregado?</label>
                    <select required class="form-control" name="employee">
                      <option value="Sim" @if(old('employee') == 'Sim' || $pessoa->employee == 'Sim') selected @endif>Sim</option>
                      <option value="Não" @if(old('employee') == 'Não' || $pessoa->employee == 'Não') selected @endif>Não</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="job_title">Profissão:</label>
                    <input type="text" class="form-control" name="job_title" value="{{ old('job_title', $pessoa->job_title) }}"/>
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