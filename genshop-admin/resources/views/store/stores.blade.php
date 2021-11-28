@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4">
      <h1> Lojas </h1>
      @if($stores)
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col" width="300px">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Celular</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Tipo</th>
            <th scope="col" width="300px">Endereço</th>
            <th scope="col" width="300px">Opções</th>
          </tr>
        </thead>
        <tbody>
          @foreach($stores as $store)
          <tr>
            <td>{{$store->id}}</td>
            <td>{{$store->name}}</td>
            <td>{{$store->telephone}}</td>
            <td>{{$store->cellphone}}</td>
            <td>{{$store->cnpj}}</td>
            <td>{{$store->type}}</td>
            <td>{{$store->address}}</td>
            <td>
              <a href="{{route('stores.show', $store->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
              <a href="{{route('stores.edit', $store->id)}}" class="btn btn-primary btn-sm">Editar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
  @endsection