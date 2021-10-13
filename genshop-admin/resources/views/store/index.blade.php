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
    <h1> Lojas </h1>
    <a class="nav-link" href="{{ route('store.create') }}" >Novo</a>
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
        @foreach($stores as $store)
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
              <form class="d-inline" method="POST" action="{{ route('store.destroy', $store->id) }}" onsubmit="return remover();">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary btn-sm">Apagar</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection