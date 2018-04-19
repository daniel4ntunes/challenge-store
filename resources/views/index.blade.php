@extends('main') 
@section('content')
    <div class="text-center">
        <h1 class="mt-5">Loja Virtual</h1><hr>
    </div>
    <div class="card-deck">
        @foreach($products->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $product)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('img/' . $product->image) }}" alt="Card image cap" class="card-img-top img-fluid">
                <div class="card-body">
                    <h5 class="card-title">
                        <strong>{{ $product->name }}</strong>
                    </h5>
                    <p class="card-text">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success pull-left">Comprar</button>
                    <a href="{{ url('shop', [$product->id]) }}" class="btn btn-secondary pull-right">Detalhes</a>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        @endforeach
    </div>
@stop