@extends('template.principal')
<script> 
        function remover(){
            return confirm('Você deseja realmente remover o produto?');
        }
</script>
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
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">Categorias</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<body>
<h1> Produtos </h1>
<a class="nav-link" href="{{ route('product.create') }}" >Novo</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Preço</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>
    @if($products)
    @foreach($products as $product)
    <tr>
      <td>{{$product->id}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}}</td>
      <td> 
            <a href="{{route('product.show', $product->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
            <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary btn-sm">Editar</a>
            <form class="d-inline" method="POST" action="{{ route('product.destroy', $product->id) }}" onsubmit="return remover();">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-primary btn-sm">Apagar</button>
            </form>
          </td>
  <div class="container py-5">
    <h1> Produtos </h1>
    <a class="nav-link" href="{{ route('product.create') }}" >Novo</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Preço</th>
          <th scope="col">Opções</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
          <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td> 
              <a href="{{route('product.show', $product->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
              <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary btn-sm">Editar</a>
              <form class="d-inline" method="POST" action="{{ route('product.destroy', $product->id) }}" onsubmit="return remover();">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary btn-sm">Apagar</button>
              </form>
            </td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
  </div>
@endsection