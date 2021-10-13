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
      </div>
    </div>
  </nav>
</header>

<body>
<form style="margin-left:35%;margin-top:1vh" method="POST" action="{{ Route('product.store') }}" >
@csrf
<h1> Produtos </h1>
    <input type="text" name="store_id" id="store_id" class="d-none" value="1"/>
  <div class="form-outline mb-4">
    <input type="text" id="nome" name="nome" placeholder="Nome do Produto" style="width:450px"/>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="preco" name="preco" placeholder="Preço do Produto" style="width:450px"/>
  </div>
  <div class="form-outline mb-4">
            <span class="form-label">Imagem:</span>
            <input type="file" class="form-control" name="foto">
        </div>
  <div class="form-outline mb-4">
    <textarea id="descricao" name="descricao" placeholder="Descrição do Produto" rows="4" style="width:450px"></textarea>
  </div>
  <div class="form-outline mb-4">
            <span class="form-label"> Categoria </span>
            <select class="form-select" name="category_id">  
                @foreach($categories as $category)
                <option value="{{$category->id}}"> {{$category->name}} </option>
                @endforeach
            </select>
        </div>
  <button type="submit" style="width:150px" class="btn btn-primary btn-block mb-4">Cadastrar</button>
</form>
</body>
  <div class="container py-5">
    <form method="POST" action="{{ Route('product.store') }}">
      @csrf
      <h1 class="pb-4">Cadastrar Produto</h1>
      <input type="text" name="store_id" id="store_id" class="d-none" value="1" />

      <div class="form-outline mb-4">
        <input class="form-control" type="text" id="nome" name="nome"/>
        <label class="form-label" for="nome">Nome do Produto</label>      
      </div>

      <div class="form-outline mb-4">
        <input class="form-control" type="text" id="preco" name="preco"/>
        <label class="form-label" for="preco">Preço do Produto</label>
      </div>
      
      <div class="form-outline mb-4">
        <textarea class="form-control" id="descricao" name="descricao" rows="4"></textarea>
        <label class="form-label" for="descricao">Descrição do Produto</label>
      </div>

      <div class="form-group mb-4">
        <label for="foto">Foto</label>
        <input class="form-control" type="file" class="form-control" name="foto">
      </div>

      <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
    </form>
  </div>
@endsection