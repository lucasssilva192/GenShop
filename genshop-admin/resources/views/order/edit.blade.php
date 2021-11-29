@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <div class="card container-sm p-4">
      <form method="POST" action="{{ Route('order.update', $order->id) }}">
        @csrf
        @METHOD('PATCH')
        <h1 class="pb-4">Atualizar status:</h1>
        <div class="form-outline mb-4">
          <span class="form-label"> Status do pedido: </span>
          <select class="form-control" name="status">
            <option value="Em preparo">Em preparo</option>
            <option value="Enviado">Enviado</option>
            <option value="Cancelado">Cancelado</option>
            <option value="Recebido pela loja">Recebido pela loja</option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4">Salvar</button>
      </form>
    </div>
  </div>
</body>
@endsection