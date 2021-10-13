@extends('template.principal')

@section('content')
  <div class="container py-5">
    <form method="POST" action="{{ Route('store.update', $store->id) }}">
      @csrf
      @METHOD('PATCH')
      <h1 class="pb-4">Editar Loja</h1>
  
      <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="nome" name="nome" value="{{$store->name}}"/>
          <label class="form-label" for="nome">Nome da Loja</label> 
        </div>
  
        <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="endereco" name="endereco" value="{{$store->address}}"/>
          <label class="form-label" for="endereco">Endereço</label> 
        </div>
  
        <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="cnpj" name="cnpj" value="{{$store->cnpj}}"/>
          <label class="form-label" for="cnpj">CNPJ</label> 
        </div>
  
        <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="celular" name="celular" value="{{$store->cellphone}}"/>
          <label class="form-label" for="celular">Celular</label> 
        </div>
  
        <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="telefone" name="telefone" value="{{$store->telephone}}"/>
          <label class="form-label" for="telefone">Telefone</label> 
        </div>
  
        <div class="form-group mb-4">
          <label for="foto_perfil">Foto</label>
          <input class="form-control" type="file" class="form-control" name="foto_perfil" value="{{$store->profile_pic}}">
        </div>
  
        <button type="submit" class="btn btn-primary btn-block mb-4">Salvar</button>
    </form>
  </div>
@endsection