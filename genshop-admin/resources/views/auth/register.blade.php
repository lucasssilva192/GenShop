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
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GenShop Admin</a>
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        @if(Auth()->user())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('store.index') }}">Lojas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('product.index') }}">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('order.index') }}">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Bem-Vindo {{Auth()->user()->name}}</a>
          </li>
          @endif
          @if(!Auth()->user())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrar</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
</header>

<body>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
</body>

<!--Footer-->
<footer class="bg-light text-lg-start fixed-bottom">

  <div class="text-center py-4 align-items-center">
    <a href="https://twitter.com/MDBootstrap" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
      <i class="fab fa-twitter"></i>
    </a>
    <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
      <i class="fab fa-github"></i>
    </a>
  </div>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
@endsection