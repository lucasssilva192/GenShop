@extends('template.principal')

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
  <div class="container py-5">
    <form method="POST" action="{{ Route('store.store') }}" enctype="multipart/form-data">
      @csrf
      <h1 class="pb-4">Cadastrar Loja</h1>
      <input type="text" name="store_id" id="store_id" class="d-none" value="1"/>

      <div class="form-outline mb-4">
        <input class="form-control" type="text" id="nome" name="nome"/>
        <label class="form-label" for="nome">Nome da Loja</label> 
      </div>

<body>
<form style="margin-left:35%;margin-top:1vh" method="POST" action="{{ Route('store.store') }}" enctype="multipart/form-data">
@csrf
<h1> Lojas </h1>
  <input type="text" name="user_id" id="user_id" class="d-none" value="{{Auth()->user()->id}}"/>
  <div class="form-outline mb-4">
    <input type="text" id="nome" name="nome" placeholder="Nome da Loja" style="width:450px"/>
  </div>

  <div class="form-outline mb-4">
    <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" style="width:450px"/>
  </div>

    <div class="form-outline mb-4">
      <input type="text" id="celular" name="celular" placeholder="Celular" style="width:450px" />
    </div>

    <div class="form-outline mb-4">
      <input type="text" id="telefone" name="telefone" placeholder="Telefone" style="width:450px" />
    </div>

    <div class="form-outline mb-4">
      <input type="text" id="endereco" name="endereco" placeholder="Endereço" style="width:450px" />
    </div>

  <div class="form-outline mb-4">
            <span class="form-label">Imagem:</span>
            <input type="file" class="form-control" name="foto_perfil">
        </div>

  <button type="submit" style="width:150px" class="btn btn-primary btn-block mb-4">Cadastrar</button>
</form>
</body>
      <div class="form-outline mb-4">
        <input class="form-control" type="text" id="endereco" name="endereco"/>
        <label class="form-label" for="endereco">Endereço</label> 
      </div>

      <div class="form-outline mb-4">
        <input class="form-control" type="text" id="cnpj" name="cnpj"/>
        <label class="form-label" for="cnpj">CNPJ</label> 
      </div>

      <div class="form-outline mb-4">
        <input class="form-control" type="text" id="celular" name="celular"/>
        <label class="form-label" for="celular">Celular</label> 
      </div>

      <div class="form-outline mb-4">
        <input class="form-control" type="text" id="telefone" name="telefone"/>
        <label class="form-label" for="telefone">Telefone</label> 
      </div>

      <div class="form-group mb-4">
        <label for="foto_perfil">Foto</label>
        <input class="form-control" type="file" class="form-control" name="foto_perfil">
      </div>

      <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
    </form>    
  </div>
@endsection