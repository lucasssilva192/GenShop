@extends('template.principal')

@section('css')
<style>
  /* Carousel styling */
  #introCarousel,
  .carousel-inner,
  .carousel-item,
  .carousel-item.active {
    height: 100vh;
  }

  .carousel-item:nth-child(1) {
    background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
  }

  .carousel-item:nth-child(2) {
    background-image: url('https://mdbootstrap.com/img/Photos/Others/images/77.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
  }

  .carousel-item:nth-child(3) {
    background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
  }

  /* Height for devices larger than 576px */
  @media (min-width: 992px) {
    #introCarousel {
      margin-top: -58.59px;
    }
  }

  .navbar .nav-link {
    color: black !important;
  }
</style>
@endsection

@section('content')
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GenShop Admin</a>
      <div class="collapse navbar-collapse" id="navbarNav">
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
        </ul>
      </div>
    </div>
  </nav>
</header>

<body>
  <div class="container">
    <h1> Lojas </h1>
    <a class="nav-link" href="{{ route('store.create') }}">Novo</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">CNPJ</th>
          <th scope="col">Celular</th>
          <th scope="col">Telefone</th>
          <th scope="col">Endereço</th>
          <th scope="col">Opções</th>
        </tr>
      </thead>
      <tbody>
        @foreach($stores as $store)
        <tr>
          <td>{{$store->id}}</td>
          <td>{{$store->name}}</td>
          <td>{{$store->cnpj}}</td>
          <td>{{$store->cellphone}}</td>
          <td>{{$store->telephone}}</td>
          <td>{{$store->address}}</td>
          <td>
            <a href="#" class="btn btn-primary btn-sm">Visualizar</a>
            <a href="#" class="btn btn-primary btn-sm">Editar</a>
            <form class="d-inline" method="POST" action="remover" onsubmit="">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-primary btn-sm">Apagar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

<!--Footer-->
<footer class="bg-light text-lg-start fixed-bottom">
  <div class="text-center py-4 align-items-center">
    <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
      <i class="fab fa-twitter"></i>
    </a>
    <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
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