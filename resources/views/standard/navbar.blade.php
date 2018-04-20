<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">
        <img src="../img/logo_gamersXYZ.png" width="30" height="30" class="d-inline-block align-top" alt="Logo GamersXYZ"> GamersXYZ
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/cart') }}">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i> Carrinho
                    <span class="badge badge-pill badge-light">
                        {{ Session::get('qty_in_cart') }}
                    </span>
                </a>
            </li>
        </ul>
        @if(Request::is('/'))
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" name="search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        @endif
    </div>
</nav>