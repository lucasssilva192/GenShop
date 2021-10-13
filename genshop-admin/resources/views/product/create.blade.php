@extends('template.principal')

@section('content')
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