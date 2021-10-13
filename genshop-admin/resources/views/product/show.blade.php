@extends('template.principal')

@section('content')
  <div class="container py-5">
    <div class="row">
        <div class="text-center">
            <h2 class="lt-branca"> {{ $product->name }} </h2>
            <p class="lt-branca"> {{ $product->description }} </p>
            <span class="h4 lt-branca"> R$ {{ $product->price }} </span>
        </div>
    </div>
  </div>
@endsection