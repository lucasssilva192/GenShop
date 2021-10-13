@extends('template.principal')

@section('content')
  <div class="container py-5">
    <form method="POST" action="{{ Route('store.store') }}" enctype="multipart/form-data">
      @csrf
      <h1 class="pb-4">Cadastrar Loja</h1>
      <input type="text" name="store_id" id="store_id" class="d-none" value="1"/>

      <div class="form-outline mb-4">
        <input class="form-control" type="text" id="nome" name="nome"/>
        <label class="form-label" for="nome">Nome da Loja</label> 
      </div>

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