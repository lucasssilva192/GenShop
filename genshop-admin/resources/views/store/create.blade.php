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
        </ul>
      </div>
    </div>
  </nav>
</header>

<body>
  <form style="margin-left:35%;margin-top:1vh">
    <h1> Produtos </h1>
    <div class="form-outline mb-4">
      <input type="text" id="nome" name="nome" placeholder="Nome da Loja" style="width:450px" />
    </div>

    <div class="form-outline mb-4">
      <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" style="width:450px" />
    </div>

    <div class="form-outline mb-4">
      <input type="text" id="celular" name="celular" placeholder="Celular" style="width:450px" />
    </div>

    <div class="form-outline mb-4">
      <input type="text" id="telefone" name="telefone" placeholder="Telefone" style="width:450px" />
    </div>

    <div class="form-outline mb-4">
      <input type="text" id="foto_perfil" name="foto_perfil" placeholder="Foto de perfil" style="width:450px" />
    </div>

    <div class="form-outline mb-4">
      <input type="text" id="endereco" name="endereco" placeholder="Endereço" style="width:450px" />
    </div>

    <div class="form-outline mb-4">
      <textarea id="descricao" name="descricao" placeholder="Descrição do Produto" rows="4" style="width:450px"></textarea>
    </div>

    <button type="submit" style="width:150px" class="btn btn-primary btn-block mb-4">Cadastrar</button>
  </form>
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