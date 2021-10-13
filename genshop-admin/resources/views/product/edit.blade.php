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
    </div>
  <div class="container py-5">
    <form method="POST" action="{{ Route('product.update', $product->id) }}">
      @csrf
      @METHOD('PATCH')
      <h1 class="pb-4">Editar Produto</h1>
        <input type="text" name="store_id" id="store_id" class="d-none" value="1" />
  
        <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="nome" name="nome" value="{{$product->name}}"/>
          <label class="form-label" for="nome">Nome do Produto</label>      
        </div>
  
        <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="preco" name="preco" value="{{$product->price}}"/>
          <label class="form-label" for="preco">Preço do Produto</label>
        </div>
  
        <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="foto" name="foto" value="{{$product->picture}}"/>
          <label class="form-label" for="foto">Foto</label>
        </div>
  
        <div class="form-outline mb-4">
          <textarea class="form-control active" id="descricao" name="descricao" rows="4">{{$product->description}}</textarea>
          <label class="form-label" for="descricao">Descrição do Produto</label>
        </div>
  
        <button type="submit" class="btn btn-primary btn-block mb-4">Salvar</button>
    </form>
  </div>
@endsection