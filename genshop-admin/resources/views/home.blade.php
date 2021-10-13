@extends('template.principal')

@section('css')
<style>
  /* Carousel styling */
  #introCarousel,
  .carousel-inner,
  .carousel-item,
  .carousel-item.active {
    height: 100vh;
  }

  .carousel-item:nth-child(1) {
    background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
  }

  .carousel-item:nth-child(2) {
    background-image: url('https://mdbootstrap.com/img/Photos/Others/images/77.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
  }

  .carousel-item:nth-child(3) {
    background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
  }

  /* Height for devices larger than 576px */
  @media (min-width: 992px) {
    #introCarousel {
      margin-top: -58.59px;
    }
  }

  .navbar .nav-link {
    color: black !important;
  }
</style>
@endsection

@section('content')
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