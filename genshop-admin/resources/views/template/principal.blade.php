<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('css/mdb/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom/style.css') }}" />
    @yield('css')
    <!-- import the MDB javascript file https://mdbootstrap.com/ -->
    <script type="text/javascript" src="{{ asset('js/mdb/mdb.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/mdb/mdb-input.js') }}"></script>
    @yield('js')
    <title>GenShop</title>
    <style>
        .bg-home{
            background-image: url('http://localhost:8000/storage/images/bg-login.jpg');
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="bg-home">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">@include('template.logo')</a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if(Auth()->user())
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('store.index') }}">Lojas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index') }}">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('order.index') }}">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.index') }}">Categorias</a>
                        </li>
                        @if(Auth()->user()->permissions == 3)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">Usuários</a>
                        </li>
                        @endif
                    </ul>                                        
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link">Bem-Vindo {{Auth()->user()->name}}</a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link class="nav-link" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </ul>
                    @endif

                    @if(!Auth()->user())
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-lg-start fixed-bottom">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); color: white;">
            © 2021 Copyright:
            <span class="font-weight-bold">Genshão Food Enterprises</span>
        </div>
    </footer>
</body>

</html>