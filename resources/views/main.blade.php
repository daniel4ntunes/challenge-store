
<!doctype html> 
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Loja Virtual</title>
        {!! Html::script('js/jquery-3.3.1.min.js') !!}
    </head>
    <body>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center"></div>
    <div class="container">
        @yield('content')
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center"></div>
    </body>
</html>