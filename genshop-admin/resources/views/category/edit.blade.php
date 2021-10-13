@extends('template.principal')

@section('content')
<body>
<div class="container py-5">
<form style="margin-left:35%;margin-top:1vh" method="POST" action="{{ Route('category.update', $category->id) }}" >
@csrf
@METHOD('PATCH')
<h1 class="pb-4">Editar Categoria</h1>
  <div class="form-outline mb-4">
    <input type="text" id="nome" name="nome" value="{{$category->name}}" placeholder="Nome da categoria" style="width:450px"/>
  </div>
  <button type="submit" style="width:150px" class="btn btn-primary btn-block mb-4">Atualizar</button>
</form>
</div>
</body>
@endsection
