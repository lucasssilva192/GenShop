@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4 bg-card">
      <form method="POST" action="{{ Route('product.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @METHOD('PATCH')
        <h1 class="text-center pb-4">Editar Produto</h1>
        <input type="text" name="store_id" id="store_id" class="d-none" value="{{Auth()->user()->id}}" />

        <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="nome" name="nome" value="{{$product->name}}" />
          <input class="form-control active" style="display:none" type="text" id="store_id" name="store_id" value="{{$product->store_id}}" />
          <label class="form-label" for="nome">Nome do Produto</label>
        </div>

        <div class="form-outline mb-4">
          <input class="form-control active" type="text" id="preco" name="preco" value="{{$product->price}}" />
          <label class="form-label" for="preco">Preço do Produto</label>
        </div>

        <div class="form-group mb-4">
          <label for="image">Foto do produto</label>
          <input type="file" class="form-control-file" name="image" value="{{$product->price}}">
        </div>

        <div class="form-outline mb-4">
          <textarea class="form-control active" id="descricao" name="descricao" rows="4">{{$product->description}}</textarea>
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
        <button type="submit" class="btn btn-primary btn-block mb-4">Salvar</button>
      </form>
    </div>
  </div>
</body>
@endsection