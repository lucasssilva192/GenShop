@extends('template.principal')

@section('content')

<body>
    <div class="container py-5">
    <div class="card container-sm">
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
          <select class="form-select" name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}"> {{$category->name}} </option>
            @endforeach
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