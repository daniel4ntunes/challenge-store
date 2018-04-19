@extends('main') 
@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-2">
        <img src="../img/{{ $product->image }}" class="img-fluid rounded float-left" alt="...">
    </div>
    <div class="col-md-10">
        <ul class="list-group">
            <li class="list-group-item">
                <strong class="text-success">{{ $product->name }}</strong>
            </li>
            <li class="list-group-item"><strong>Descrição:</strong> {{ $product->description }}</li>
            <li class="list-group-item"><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</li>
            @if(!$categories->isEmpty())
                <li class="list-group-item">
                    <strong>Categorias:</strong>
                    @foreach($categories as $category) 
                        <ul>
                            <li>{{ $category->name }}</li>
                        </ul>
                    @endforeach
                </li>
            @endif
        </ul>
    </div>
</div>
@stop