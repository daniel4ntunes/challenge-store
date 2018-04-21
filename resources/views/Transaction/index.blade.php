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
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Data</th>
                        <th>Número</th>
                        <th>Valor</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($transaction->date_added)->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $transaction->id }}</td>
                        <td>R$ {{ number_format($transaction->total, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ url('transaction/detail', [$transaction->id]) }}" class="btn btn-secondary">Detalhes</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%">
                            Você não tem pedidos.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection