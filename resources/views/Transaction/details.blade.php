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
                                <strong>Nome Completo:</strong> {{ $transaction->name }}</li>
                                <li class="list-group-item">
                                <strong>E-mail:</strong> <a href="mailto:{{ $transaction->email }}">{{ $transaction->email }}</a></li>
                            <li class="list-group-item">
                                <strong>CPF:</strong> {{ $transaction->cpf }}</li>
                            <li class="list-group-item">
                                <strong>Celular:</strong> {{ $transaction->phone }}</li>
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
                                        @php $total_price = 0 @endphp @foreach ($transactionProducts as $transactionProduct)
                                        <tr>
                                            @php $sub_total_price = $transactionProduct->unit_price * $transactionProduct->quantity @endphp @php $total_price = $total_price
                                            + $sub_total_price @endphp
                                            <td>{{ $transactionProduct->des }}</td>
                                            <td class="text-center">{{ $transactionProduct->quantity }}</td>
                                            <td class="text-right">R${{ number_format($transactionProduct->unit_price, 2, ',', '.') }}
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
                                    <strong>CEP:</strong> {{ $transactionAddress->zipcode }}</p>
                                </p>
                                <p>
                                    <strong>ENDEREÇO:</strong> {{ $transactionAddress->street }}</p>
                                </p>
                                @if($transactionAddress->complement != '')
                                <p>
                                    <strong>COMPLEMENTO:</strong> {{ $transactionAddress->complement }}</p>
                                </p>
                                @endif
                                <p>
                                    <strong>BAIRRO:</strong> {{ $transactionAddress->neighbourhood }}</p>
                                </p>
                                <p>
                                    <strong>CIDADE/UF:</strong> {{ $transactionAddress->city }} / {{ $transactionAddress->state }}</p>
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