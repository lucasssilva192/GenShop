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
        <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">Categorias</a>
          </li>
      </ul>
  <div class="container py-5">
    <div class="row">
        <div class="text-center">
            <h2 class="lt-branca"> {{ $product->name }} </h2>
            <p class="lt-branca"> {{ $product->description }} </p>
            <span class="h4 lt-branca"> R$ {{ $product->price }} </span>
        </div>
    </div>
  </div>
@endsection