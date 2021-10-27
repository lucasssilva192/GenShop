@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4">
      <form method="POST" action="{{ Route('category.update', $category->id) }}">
        @csrf
        @METHOD('PATCH')
        <h1 class="pb-4">Editar Categoria</h1>
        <div class="form-outline mb-4">
          <input type="text" class="form-control active" id="nome" name="nome" value="{{$category->name}}" style="width:450px" />
          <label class="form-label" for="nome">Nome do Produto</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4">Atualizar</button>
      </form>
    </div>
  </div>
</body>
@endsection