@extends('template.principal')

@section('content')
<div class="container py-5">
  <div class="card mb-3 bg-card" style="max-width: 1500px;">
    <div class="row g-0 p-3">
      <div class="col-md-4">
        <img src="/img/products/{{$product->picture}}" alt="..." class="img-fluid" />
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h2 class="card-title">{{ $product->name }}</h2>
          <p class="card-text mt-n0">
          <h6>Descrição do produto:</h6>
          </p>
          <p class="card-text">
            {{ $product->description }}
          </p>
          <div class="d-flex align-items-center" style="height: 100px;">
            <div class="col">
            <p class="card-text">
              <h6>Preço do produto:</h6>
            </p>
            <p class="card-text">
            {{ $product->price }}
          </p>
            </div>
            <div class="col">
            <p class="card-text">
              <h6>Categoria:</h6>
            </p>
            <p class="card-text">
            {{ $product->category }}
          </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection