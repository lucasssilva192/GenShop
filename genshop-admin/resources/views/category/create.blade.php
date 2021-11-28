@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4 bg-card">
      <form method="POST" action="{{ Route('category.store') }}">
        @csrf
        <h1 class="text-center pb-4">Cadastrar Categoria</h1>
        <input type="text" name="store_id" id="store_id" class="d-none" value="1" />
        <div class="form-outline mb-4">
          <input class="form-control" type="text" id="nome" name="nome" />
          <label class="form-label" for="preco">Nome da Categoria</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
      </form>
    </div>
  </div>
</body>
@endsection