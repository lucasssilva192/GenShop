@extends('template.principal')

@section('content')
<div class="container py-5">
<form action="{{Route('/login')}}">
    <div class="form-outline mb-4">
      <input type="email" id="form2Example1" class="form-control" />
      <label class="form-label" for="form2Example1">Email address</label>
    </div>
    <div class="form-outline mb-4">
      <input type="password" id="form2Example2" class="form-control" />
      <label class="form-label" for="form2Example2">Password</label>
    </div>
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="form2Example3" checked />
          <label class="form-check-label" for="form2Example3"> Remember me </label>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
  </form>
</div>
@endsection





<div class="form-outline mb-4">
      <input class="form-control" type="text" id="nome" name="nome" name="endereco" />
      <label class="form-label" for="endereco">Endereço</label>
    </div>

    <div class="form-outline mb-4">
      <input class="form-control" type="text" id="endereco" name="endereco" />
      <label class="form-label" for="endereco">Endereço</label>
    </div>

    <div class="form-outline mb-4">
      <input class="form-control" type="text" id="cnpj" name="cnpj" />
      <label class="form-label" for="cnpj">CNPJ</label>
    </div>

    <div class="form-outline mb-4">
      <input class="form-control" type="text" id="celular" name="celular" />
      <label class="form-label" for="celular">Celular</label>
    </div>

    <div class="form-outline mb-4">
      <input class="form-control" type="text" id="telefone" name="telefone" />
      <label class="form-label" for="telefone">Telefone</label>
    </div>

    <div class="form-group mb-4">
      <label for="foto_perfil">Foto</label>
      <input class="form-control" type="file" class="form-control" name="foto_perfil">
    </div>

    <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
