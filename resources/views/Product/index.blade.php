@extends('Standard.main') @section('content')
<div class="row">
    <div class="input-group mb-3">
        {{-- <form method="GET" action="/search"> --}}
            <input type="text" class="form-control" name="search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        {{-- </form> --}}
        {{-- {{ Form::open(['method' => 'get', 'route' => 'search']) }}
            {{ csrf_token() }}
            {{ Form::input('search', 'query', Input::get('query', ''))}}
            {{ Form::submit('Filter results') }}
        {{ Form::close() }} --}}
    </div>
    <div class="col-md-12">
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
                        <p class="card-text">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>
                    <div class="card-footer">
                        <button onclick="Product.add('{{ $product->id }}');" class="btn btn-success pull-left">Comprar</button>
                        <a href="{{ url('shop', [$product->id]) }}" class="btn btn-secondary pull-right">Detalhes</a>
                    </div>
                </div>
                @endforeach
            </div><br> 
            @endforeach
        </div>
    </div>
</div>

{!! Html::script('js/Product/index.js') !!} @stop