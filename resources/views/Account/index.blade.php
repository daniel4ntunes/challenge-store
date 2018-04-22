@extends('Standard.main') @section('content')
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item {{ Request::is('account') ? 'active' : '' }}">
                    @if(Request::is('account'))
                    Minha Conta
                    @else
                    <a href="{{ url('/account') }}">Minha Conta</a>
                    @endif
                </li>
                <li class="breadcrumb-item {{ Request::is('transaction') ? 'active' : '' }}">
                    @if(Request::is('transaction'))
                    Meus Pedidos
                    @else
                    <a href="{{ url('/transaction') }}">Meus Pedidos</a>
                    @endif
                </li>
            </ol>
        </nav>
    </div>
</div>
@endsection