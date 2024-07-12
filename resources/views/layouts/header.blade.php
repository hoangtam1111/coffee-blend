<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Coffee<small>Blend</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{ route('menu') }}" class="nav-link">Menu</a></li>
            <li class="nav-item"><a href="{{ route('services') }}" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>

            <li class="nav-item"><a href="{{ route('evalute.index') }}" class="nav-link">Evalute</a></li>
            <li class="nav-item cart"><a href="{{ route('cart.index') }}" class="nav-link"><span class="icon icon-shopping_cart"></span></a>

            @if (empty(session()->get('name')))
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">login</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">register</a></li>
            @else
                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">logout</a></li>

            @endif

            </ul>
        </div>
    </div>
</nav>

