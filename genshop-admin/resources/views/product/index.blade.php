@extends('template.principal')
@section('content')
<body>
  <div class="container py-5">
    <h1> Produtos </h1>
    <a class="nav-link" href="{{ route('product.create') }}">Novo</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Preço</th>
          <th scope="col">Opções</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td>{{$product->id}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->price}}</td>
          <td>
            <a href="{{route('product.show', $product->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
            <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary btn-sm">Editar</a>
            <form class="d-inline" method="POST" action="{{ route('product.destroy', $product->id) }}" onsubmit="return remover();">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-primary btn-sm">Apagar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
@endsection
<script>
  function remover() {
    return confirm('Você deseja realmente remover o produto?');
  }
</script>