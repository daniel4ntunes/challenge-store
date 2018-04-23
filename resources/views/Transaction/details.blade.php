@extends('Standard.main') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Pedido #{{ $transaction->id }}, Realizado {{ $transaction->date_added->diffForHumans() }}</strong>
                <span class="pull-right">
                    <a href="/transaction" class="btn-sm">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <i class="fa fa-angle-left" aria-hidden="true"></i> voltar
                    </a>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Nome Completo:</strong> {{ $transaction->customer->name }}</li>
                                <li class="list-group-item">
                                <strong>E-mail:</strong> <a href="mailto:{{ $transaction->customer->email }}">{{ $transaction->customer->email }}</a></li>
                            <li class="list-group-item">
                                <strong>CPF:</strong> {{ $transaction->customer->cpf }}</li>
                            <li class="list-group-item">
                                <strong>Celular:</strong> {{ $transaction->customer->phone }}</li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Produtos</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th class="text-center">Quantidade</th>
                                            <th class="text-right">Preço Unitário</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total_price = 0 @endphp 
                                        @foreach ($transaction->product as $item)
                                        <tr>
                                            @php $sub_total_price = $item->unit_price * $item->quantity @endphp 
                                            @php $total_price = $total_price + $sub_total_price @endphp
                                            <td>{{ $item->des }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-right">R${{ number_format($item->unit_price, 2, ',', '.') }}
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-right" colspan="3">
                                                <strong>TOTAL DA COMPRA: </strong>
                                                R${{ number_format($total_price, 2, ',', '.') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Endereço de Entrega</div>
                            <div class="card-body">
                                <p>
                                    <strong>CEP:</strong> {{ $transaction->address->zipcode }}</p>
                                </p>
                                <p>
                                    <strong>ENDEREÇO:</strong> {{ $transaction->address->street }}</p>
                                </p>
                                @if($transaction->address->complement != '')
                                <p>
                                    <strong>COMPLEMENTO:</strong> {{ $transaction->address->complement }}</p>
                                </p>
                                @endif
                                <p>
                                    <strong>BAIRRO:</strong> {{ $transaction->address->neighbourhood }}</p>
                                </p>
                                <p>
                                    <strong>CIDADE/UF:</strong> {{ $transaction->address->city }}/{{ $transaction->address->state }}</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop