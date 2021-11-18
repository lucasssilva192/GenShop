@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4 bg-card">
      <form method="POST" action="{{ Route('store.store') }}" enctype="multipart/form-data">
        @csrf
        <h1 class="text-center pb-4"> Cadastrar Loja </h1>
        <input type="text" name="user_id" id="user_id" class="d-none" value="{{Auth()->user()->id}}" />

        <div class="form-outline mb-4">
          <input class="form-control" type="text" id="nome" name="nome" />
          <label class="form-label" for="nome">Nome da Loja</label>
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

        <div class="form-outline mb-4">
        <select class="form-control" name="tipo">
          <option value="0" disabled selected>Escolha o tipo da sua loja</option>
          <option value="1">Restaurante</option>
          <option value="2">Ferraria</option>
          <option value="3">Lembranças</option>
          <option value="4">Mercado</option>
          <option value="5">Alquimia</option>
          <option value="6">Móveis</option>
          <option value="7">Paisagismo</option>
          <option value="8">Pesca</option>
        </select>
        </div>

        <div class="form-group mb-4">
          <label for="image">Foto</label>
          <input class="form-control" type="file" name="image">
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
      </form>
    </div>
  </div>
</body>
@endsection