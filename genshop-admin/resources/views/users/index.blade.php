@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4">
      <h1> Usuários </h1>
      @if($users)
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col" width="300px">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Permissões</th>
            <th scope="col" width="300px">Opções</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->permissions}}</td>
            <td>
              <a href="{{route('user.show', $user->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
              <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-sm">Editar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
  @endsection