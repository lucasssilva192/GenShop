@extends('template.principal')

@section('content')
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GenShop Admin</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('store.index') }}" >Lojas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.index') }}" >Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('order.index') }}" >Pedidos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

<body>
<div class="row">
    <div class="col-6 text-center">
        <h2 class="lt-branca"> {{ $store->name }} </h2>
        <p class="lt-branca"> {{ $store->cnpj }} </p>
        <p class="lt-branca"> {{ $store->cellphone }} </p>
        <p class="lt-branca"> {{ $store->telephone }} </p>
        <p class="lt-branca"> {{ $store->address }} </p>
        <img src="asset($store->profile_pic) ">
        <img src="{{ $store->profile_pic }}">
    </div>
</div>
</body>

  <!--Footer-->
  <footer class="bg-light text-lg-start">
    
    <div class="text-center py-4 align-items-center">
      <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-github"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
@endsection
