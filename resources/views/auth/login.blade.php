@extends('Standard.main') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="card">
                    <h6 class="card-header">Login</h6>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }} 
                            @if(session()->has('login_error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('login_error') }}
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('identity') ? ' is-invalid' : '' }}">
                                <label for="identity" class="control-label">E-mail ou Nome</label>
                                <input id="identity" type="identity" class="form-control" name="identity" value="{{ old('identity') }}" autofocus> @if ($errors->has('identity'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('identity') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                <label for="password" class="control-label">Senha</label>
                                <input id="password" type="password" class="form-control" name="password"> @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old( 'remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Lembrar-me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Esqueceu sua senha?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h6 class="card-header">Registre</h6>
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('register') }}">Criar uma conta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection