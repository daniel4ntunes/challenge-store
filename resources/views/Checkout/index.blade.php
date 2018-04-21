@extends('Standard.main') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h6 class="card-header">DADOS PESSOAIS</h6>
                    <div class="card-body">
                        <div class="form-group required">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com">
                        </div>
                        <div class="form-group required">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group required">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control standard-mask-cpf" id="cpf">
                        </div>
                        <div class="form-group required">
                            <label for="phone">Celular</label>
                            <input type="text" class="form-control standard-mask-phone" id="phone">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h6 class="card-header">ENTREGA</h6>
                    <div class="card-body">
                        <div class="form-group required">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control standard-mask-cep standard-form-min-9 standard-form-max-9" id="cep">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop