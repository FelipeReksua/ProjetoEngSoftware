@extends('layouts.inner')

@section('content')
<div class="container" style="background-image: url({{ asset('images/bg.jpg') }});">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Faça login</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="usuário" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="senha" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div> --}}
                    <div class="form-group">
                        <input type="submit" value="Entrar" class="btn float-right login_btn">
                    </div>
                </form>

            </div>
            <div class="card-footer">
                {{-- <div class="d-flex justify-content-center links">
                    Não tem uma conta?<a href="#">Criar conta</a>
                </div> --}}
                <div class="d-flex justify-content-center">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-grey" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection