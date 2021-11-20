@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4">
        <form method="POST" action="{{ Route('user.update', $user->id) }}">
          @csrf
          @METHOD('PATCH')
          <h1 class="pb-4">Editar Usuário</h1>

          <div class="form-outline mb-4">
            <input class="form-control active" type="text" id="nome" name="nome" value="{{$user->name}}" />
            <label class="form-label" for="nome">Nome do usuário</label>
          </div>

          <div class="form-outline mb-4">
            <input class="form-control active" type="text" id="endereco" name="endereco" value="{{$user->email}}" />
            <label class="form-label" for="endereco">Email do usuário</label>
          </div>

          <div class="form-outline mb-4">
            <input class="form-control active" type="text" id="new_password" name="new_password" />
            <label class="form-label" for="new_password">Nova senha</label>
          </div>

          <div class="form-outline mb-4">
            <input class="form-control active" type="text" id="permissoes" name="permissoes" value="{{$user->permissions}}" />
            <label class="form-label" for="permissoes">Permissões</label>
          </div>

          <button type="submit" class="btn btn-primary btn-block mb-4">Salvar</button>
        </form>
    </div>
  </div>
</body>
@endsection