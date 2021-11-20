@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4">
      <form method="POST" action="{{ Route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <h1 class="pb-4">Cadastrar Produto</h1>
        <input type="text" name="store_id" id="store_id" class="d-none" value="1" />

        <div class="form-outline mb-4">
          <input class="form-control" type="text" id="nome" name="nome" />
          <label class="form-label" for="nome">Nome do Produto</label>
        </div>

        <div class="form-outline mb-4">
          <input class="form-control" type="text" id="preco" name="preco" />
          <label class="form-label" for="preco">Preço do Produto</label>
        </div>

        <div class="form-outline mb-4">
          <textarea class="form-control" id="descricao" name="descricao" rows="4"></textarea>
          <label class="form-label" for="descricao">Descrição do Produto</label>
        </div>
        <div class="form-outline mb-4">
          <span class="form-label"> Categoria </span>
          <select class="form-control" name="category">
            <option value="0" disabled selected>Escolha a categoria do seu produto:</option>
            <option value="Comidas/Bebidas">Comidas / Bebidas</option>
            <option value="Armas/Utilitários">Armas / Utilitários</option>
            <option value="Muambas">Muambas</option>
            <option value="Ingredientes">Ingredientes</option>
            <option value="Poções">Poções</option>
            <option value="Decorações/Móveis">Decorações / Móveis</option>
            <option value="Árvores/Flores">Árvores / Flores</option>
            <option value="Iscas/Varas">Iscas / Varas</option>
        </select>
        </div>
        <div class="form-group mb-4">
          <label for="image">Foto do produto</label>
          <input type="file" class="form-control-file" name="image">
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
      </form>
    </div>
  </div>
  @endsection