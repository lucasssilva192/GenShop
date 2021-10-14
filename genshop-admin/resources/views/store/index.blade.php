@extends('template.principal')

@section('content')
<body>
  <div class="container py-5">
    <h1> Lojas </h1>
    @if(!$store)
    <a class="nav-link" href="{{ route('store.create') }}" >Novo</a>
    @endif
    @if($store)
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">CNPJ</th>
          <th scope="col">Celular</th>
          <th scope="col">Telefone</th>
          <th scope="col">Endereço</th>
          <th scope="col">Opções</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td>{{$store->id}}</td>
            <td>{{$store->name}}</td>
            <td>{{$store->cnpj}}</td>
            <td>{{$store->cellphone}}</td>
            <td>{{$store->telephone}}</td>
            <td>{{$store->address}}</td>
            <td> 
              <a href="{{route('store.show', $store->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
              <a href="{{route('store.edit', $store->id)}}" class="btn btn-primary btn-sm">Editar</a>
            </td>
          </tr>
      </tbody>
    </table>
@endif
  </div>
@endsection