@extends('Standard.main') @section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('success_message'))
        <div class="alert alert-success" id="success-alert" role="alert">
            {{ session()->get('success_message') }}
        </div>
        @endif @if (session()->has('error_message'))
        <div class="alert alert-danger" id="success-alert" role="alert">
            {{ session()->get('error_message') }}
        </div>
        @endif
    </div>

    <div class="col-md-12">
        @if(count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-cart">
                <thead class="thead-light">
                    <tr>
                        <th>PRODUTO</th>
                        <th>PREÇO</th>
                        <th class="text-center">QUANTIDADE</th>
                        <th>TOTAL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total_price = 0 @endphp @foreach ($cart as $item)
                    <tr>
                        <td>
                            <a href="{{ url('shop/detail', [$item->product_id]) }}" class="text-primary">{{ $item->name }}</a>
                        </td>
                        <td>R${{ number_format($item->unit_price, 2, ',', '.') }}</td>
                        <td class="quantity">
                            <form>
                                <a id="minus" data-ref="m{{ $item->id }}" class="item-quantity-change">
                                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                </a>
                                <input name="qtd[]" data-ref="i{{ $item->id }}" class="form-control standard-mask-integer" id="{{ $item->id }}" value="{{ $item->quantity }}">
                                <a id="plus" data-ref="p{{ $item->id }}" class="item-quantity-change">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                            </form>
                        </td>
                        @php $sub_total_price = $item->unit_price * $item->quantity @endphp
                        <td>R${{ number_format($sub_total_price, 2, ',', '.') }}</td>
                        @php $total_price = $total_price + $sub_total_price @endphp
                        <td class="remove align-remove">
                            <a onclick="Cart.delete('{{ $item->id }}')" class="item-remove">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            <div class="card float-right">
                <div class="card-body">
                    <strong class="text-secondary">TOTAL DA COMPRA: </strong>
                    <strong class="text-primary">R$ {{ number_format($total_price, 2, ',', '.') }}</strong>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-xs-6 pull-left">
                    <a href="/" class="btn btn-secondary">Continuar comprando</a>
                </div>
                <div class="col-md-6 col-xs-6 pull-right text-right">
                    <a href="/checkout" class="btn btn-primary">Fechar Pedido</a>
                </div>
            </div>
        </div>
        @else
        <div class="lead text-center" style="margin-top:20px;">
            <img src="../img/cartEmpty.png" class="img-fluid" alt="Carrinho Vazio">
            <h1 class="page-header" style="margin-top: 30px">Seu carrinho está vazio</h1>
            <p>Você não tem itens no seu carrinho de compras.</p>
            <p>Clique
                <a href="/">aqui</a> e continue comprando.</p>
        </div>
        @endif
    </div>
</div>
{!! Html::script('js/Cart/index.js') !!} @stop