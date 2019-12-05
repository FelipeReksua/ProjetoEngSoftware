@extends('layouts.inner')

@section('content')
<div class="container" style="background-image: url({{ asset('images/bg.jpg') }});">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Faça login</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="usuário">
                        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="senha">
                    </div>
                    {{-- <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div> --}}
                    <div class="form-group">
                        <input type="submit" value="Entrar" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            {{-- <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Não tem uma conta?<a href="#">Criar conta</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">Esqueceu sua senha?</a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection