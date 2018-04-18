@extends('main') @section('content')
<div class="">
    <div class="text-center">
        <h1 class="mt-5">Loja Virtual</h1><hr>
        <!-- <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus venenatis diam id scelerisque eleifend. Aenean volutpat
            ut metus non blandit. Mauris felis tortor, accumsan non urna quis, auctor semper lorem. Ut gravida feugiat tortor,
            id laoreet massa feugiat vel. Vestibulum dapibus ultrices semper. Donec porta laoreet aliquam. Sed at placerat
            sapien. Nulla facilisi. Fusce accumsan odio at massa sodales eleifend. Proin rhoncus in sem a tincidunt. Praesent
            mi quam, aliquet accumsan cursus ut, ultricies ullamcorper quam. Pellentesque dapibus nibh pharetra enim imperdiet
            tincidunt. Integer in luctus nisi, eget finibus magna. Duis tincidunt placerat fermentum. Vivamus accumsan tincidunt
            faucibus. In erat purus, congue et lorem non, sollicitudin consequat magna. Sed facilisis odio justo. Nulla facilisi.
            Phasellus auctor ligula et dictum bibendum. Nunc eleifend quis metus a ultrices. Sed mattis arcu at finibus mattis.
            Curabitur eget felis nec metus rutrum semper. Donec eget vehicula mi. Quisque finibus libero eget libero porta,
            nec scelerisque tellus fermentum. Sed at sodales augue. Quisque fermentum sollicitudin enim, sit amet lobortis
            eros porttitor ac. Etiam euismod est sed enim faucibus, at lacinia nisl luctus. Ut condimentum eget massa maximus
            cursus. Etiam pretium, sapien nec eleifend consequat, eros massa pharetra sapien, congue dignissim tellus nisl
            vel nibh.
        </p> -->
        <!-- <button class="btn btn-outline-primary my-2 my-sm-0" onclick="">Start</button> -->
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
                <button type="button" class="btn btn-primary pull-right">Comprar</button>
                <button type="button" class="btn btn-secondary pull-left">Detalhes</button>
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
                <button type="button" class="btn btn-primary pull-right">Comprar</button>
                <button type="button" class="btn btn-secondary pull-left">Detalhes</button>
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
                <button type="button" class="btn btn-primary pull-right">Comprar</button>
                <button type="button" class="btn btn-secondary pull-left">Detalhes</button>
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
                <button type="button" class="btn btn-primary pull-right">Comprar</button>
                <button type="button" class="btn btn-secondary pull-left">Detalhes</button>
            </div>
        </div>
    </div>
</div>
@stop