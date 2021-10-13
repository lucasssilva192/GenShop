@extends('template.principal')

@section('content')
  <div class="container py-5">
    <div class="row">
        <div class="text-center">
            <h2 class="lt-branca"> {{ $store->name }} </h2>
            <p class="lt-branca"> {{ $store->cnpj }} </p>
            <p class="lt-branca"> {{ $store->cellphone }} </p>
            <p class="lt-branca"> {{ $store->telephone }} </p>
            <p class="lt-branca"> {{ $store->address }} </p>
            <img src="asset($store->profile_pic) ">
            <img src="{{ $store->profile_pic }}">
        </div>
    </div>
  </div>
@endsection
