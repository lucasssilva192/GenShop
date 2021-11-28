@extends('template.principal')

@section('content')  
  <section class="text-center container py-5">
    <h2 class="mb-5 h1 text-white font-weight-bold">BEM-VINDO</h2>

    <div class="row">

      <div class="col-lg-4 col-md-6 mb-3">

        <div class="card bg-card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{ asset('storage/images/loja.png') }}" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <a href="{{ route('store.index') }}" class="btn btn-primary">Lojas</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-3">
        <div class="card bg-card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{ asset('storage/images/produto.png') }}" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <a href="{{ route('product.index') }}" class="btn btn-primary">Produtos</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-3">
        <div class="card bg-card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{ asset('storage/images/pedido.png') }}" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <a href="{{ route('order.index') }}" class="btn btn-primary">Pedidos</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection