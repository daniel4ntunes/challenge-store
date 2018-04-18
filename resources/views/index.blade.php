@extends('main') @section('content')
<div class="">
    <div class="text-center">
        <h1 class="mt-5">Loja Virtual</h1><hr>
    </div>
    <div class="card-deck">
        <div class="card" style="width: 18rem;">
            <img src="img/doom.jpg" alt="Card image cap" class="card-img-top img-fluid">
            <!-- {!! Html::image('img/assassinscreed.jpg', 'Card image cap"', array('class' => 'card-img-top', 'style' => 'width')) !!} -->
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary pull-left">Comprar</button>
                <button type="button" class="btn btn-secondary pull-right">Detalhes</button>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="img/fallout.jpg" alt="Card image cap" class="card-img-top img-fluid">
            <!-- {!! Html::image('img/watchdogs.jpg', 'Card image cap"', array('class' => 'card-img-top')) !!} -->
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary pull-left">Comprar</button>
                <button type="button" class="btn btn-secondary pull-right">Detalhes</button>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="img/ufc.jpg" alt="Card image cap" class="card-img-top img-fluid">
            <!-- {!! Html::image('img/watchdogs.jpg', 'Card image cap"', array('class' => 'card-img-top')) !!} -->
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary pull-left">Comprar</button>
                <button type="button" class="btn btn-secondary pull-right">Detalhes</button>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="img/zombi.png_large" alt="Card image cap" class="card-img-top img-fluid">
            <!-- {!! Html::image('img/watchdogs.jpg', 'Card image cap"', array('class' => 'card-img-top')) !!} -->
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary pull-left">Comprar</button>
                <button type="button" class="btn btn-secondary pull-right">Detalhes</button>
            </div>
        </div>
    </div>
</div>
@stop