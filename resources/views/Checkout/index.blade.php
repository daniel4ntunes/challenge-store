@extends('Standard.main') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h6 class="card-header">DADOS PESSOAIS</h6>
                    <div class="card-body">
                        <form id="form-account">
                            <div class="form-group required">
                                <label for="email" class="control-label">E-mail</label>
                                <input data-label="E-mail" type="email" class="form-control standard-form-require" id="email" name="email" @if(Auth::check()) value="{{ Auth::user()->email }}" readonly @endif>
                            </div>
                            <div class="form-group required">
                                <label for="name" class="control-label">Nome Completo</label>
                                <input data-label="Nome" type="text" class="form-control standard-form-require" id="name" name="name" @if(Auth::check()) value="{{ Auth::user()->name }}" readonly @endif>
                            </div>
                            <div class="form-group required">
                                <label for="cpf" class="control-label">CPF</label>
                                <input data-label="CPF" type="text" class="form-control standard-form-require standard-mask-cpf" id="cpf" name="cpf">
                            </div>
                            <div class="form-group required">
                                <label for="phone" class="control-label">Celular</label>
                                <input data-label="Celular" type="text" class="form-control standard-form-require standard-mask-phone" id="phone" name="phone">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h6 class="card-header">ENTREGA</h6>
                    <div class="card-body">
                        <form id="form-address">
                            <div class="form-group required">
                                <label for="zipcode" class="control-label">CEP</label>
                                <input data-label="CEP" type="text" class="form-control standard-form-require standard-mask-cep standard-form-min-9 standard-form-max-9" id="zipcode" name="zipcode">
                            </div>
                            <div class="form-group required">
                                <label for="street" class="control-label">Endereço</label>
                                <input data-label="Endereço" type="text" class="form-control standard-form-require" id="street" name="street">
                            </div>
                            <div class="form-group required">
                                <label for="number" class="control-label">Número</label>
                                <input data-label="Número" type="text" class="form-control standard-form-require" id="number" name="number">
                            </div>
                            <div class="form-group">
                                <label for="complement" class="control-label">Complemento</label>
                                <input data-label="Complemento" type="text" class="form-control" id="complement" name="complement">
                            </div>
                            <div class="form-group required">
                                <label for="neighbourhood" class="control-label">Bairro</label>
                                <input data-label="Bairro" type="text" class="form-control standard-form-require" id="neighbourhood" name="neighbourhood">
                            </div>
                            <div class="form-group required">
                                <label for="city" class="control-label">Cidade</label>
                                <input data-label="Cidade" type="text" class="form-control standard-form-require" id="city" name="city">
                            </div>
                            <div class="form-group required">
                                <label for="state" class="control-label">Estado</label>
                                <input data-label="Estado" type="text" class="form-control standard-form-require" id="state" name="state">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <button onclick="Checkout.process();" class="btn btn-success btn-lg float-right">Finalizar Pedido</button>
            </div>
        </div>
    </div>
</div>
{!! Html::script('js/Checkout/index.js') !!} @stop