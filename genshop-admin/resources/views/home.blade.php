@extends('template.principal')

@section('content')
<body>
  
  <section class="text-center container py-5">
    <h4 class="mb-5"><strong>BEM-VINDO</strong></h4>

    <div class="row">

      <div class="col-lg-4 col-md-6 mb-3">

        <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{ asset('storage/images/gato.png') }}" class="img-fluid" />
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
        <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{ asset('storage/images/ning.png') }}" class="img-fluid" />
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
        <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{ asset('storage/images/qiqi.png') }}" class="img-fluid" />
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