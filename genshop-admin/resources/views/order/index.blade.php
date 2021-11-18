@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4 bg-card">
      <h1 class="text-center pb-4"> Pedidos </h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Preço</th>
            <th scope="col">Status</th>
            <th scope="col">Opções</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>X</td>
            <td>Y</td>
            <td>Z</td>
            <td>
              <a href="#" class="btn btn-primary btn-sm">Visualizar</a>
              <a href="#" class="btn btn-primary btn-sm">Editar</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  @endsection