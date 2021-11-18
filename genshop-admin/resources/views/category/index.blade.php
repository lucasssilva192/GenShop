@extends('template.principal')
<script>
  function remover() {
    return confirm('Você deseja realmente remover a categoria?');
  }
</script>

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4 bg-card">
      <h1 class="text-center pb-4"> Categorias </h1>
      <a class="nav-link" href="{{ route('category.create') }}">Novo</a>
      @if($categories)
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Opções</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
              <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary btn-sm">Editar</a>
              <form class="d-inline" method="POST" action="{{ route('category.destroy', $category->id) }}" onsubmit="return remover();">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary btn-sm">Apagar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        @endif
      </table>
    </div>
  </div>
  </div>
</body>
@endsection