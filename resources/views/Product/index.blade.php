@extends('Standard.main') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="/shop">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" aria-label="Search" @if($search)value="{{ $search }}" @endif>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @if($products->isEmpty())
                <div class="card">
                    <div class="card-body">
                        <span class="lead text-secondary">Nenhum registro encontrado.</span>
                    </div>
                </div>
                @else
                @if($search)
                <p class="lead text-secondary">{{ $products->count() }} registro(s) encontrado.</p>
                @endif
                <div class="card-deck">
                    @foreach($products->chunk(4) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $product)
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->image }}" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <strong>{{ $product->name }}</strong>
                                </h5>
                                <p class="card-text">R${{ number_format($product->price, 2, ',', '.') }}</p>
                            </div>
                            <div class="card-footer">
                                <button onclick="Product.add('{{ $product->id }}');" class="btn btn-success pull-left">Comprar</button>
                                <a href="{{ url('shop/detail', [$product->id]) }}" class="btn btn-secondary pull-right">Detalhes</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br> 
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>

{!! Html::script('js/Product/index.js') !!} @stop