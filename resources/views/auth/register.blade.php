@extends('Standard.main') @section('content')

<div class="row justify-content-md-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Criar Conta</div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group required {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Nome</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group required {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-mail</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group required {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Senha</label>
                        <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group required">
                        <label for="password-confirm" class="control-label">Confirmar Senha</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Criar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection