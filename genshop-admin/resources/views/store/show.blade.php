@extends('template.principal')

@section('content')
<div class="container py-5">
  <div class="card mb-3 container-sm" style="max-width: 1500px;">
    <div class="row g-0">
      <div class="col-md-5">
        <img src="/img/stores/{{$store->profile_pic}}" alt="..." class="img-fluid" />
      </div>
      <div class="col-md-7">
        <div class="card-body">
          <h2 class="card-title">{{ $store->name }}</h2>
          <p class="card-text mt-n0">
          <h6>CNPJ:</h6>
          </p>
          <p class="card-text">
            {{ $store->cnpj }}
          </p>
          <div class="d-flex align-items-center bg-light mb-3" style="height: 100px;">
            <div class="col">
            <p class="card-text">
              <h6>Celular:</h6>
            </p>
            <p class="card-text">
            {{ $store->cellphone }}
          </p>
            </div>
            <div class="col">
            <p class="card-text">
              <h6>Telefone:</h6>
            </p>
            <p class="card-text">
            {{ $store->telephone }}
          </p>
            </div>
          </div>
          <p class="card-text mt-n0">
          <h6>Endereço:</h6>
          </p>
          <p class="card-text">
            {{ $store->address }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
