<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/logo_gamersXYZ.png') }}" width="30" height="30" class="d-inline-block align-top" alt="Logo GamersXYZ"> GamersXYZ
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/account') }}">
                        <i class="fa fa-user-circle" aria-hidden="true"></i> Minha Conta
                    </a>
                    <a class="dropdown-item" href="{{ url('/cart') }}">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Carrinho
                        <span class="badge badge-pill badge-secondary">
                            {{ Session::get('qty_in_cart') }}
                        </span>
                    </a>
                    @if(Auth::check())
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Sair</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>