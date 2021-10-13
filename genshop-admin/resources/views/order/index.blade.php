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
  <div class="container py-5">
    <h1> Pedidos </h1>
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
@endsection