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

<body>
  <div class="container py-5">
    <x-guest-layout>
      <div class="card container-sm p-4">
        <x-slot name="logo">
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h1 class="pb-4">Cadastro</h1>

        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-outline mb-4">
            <input class="form-control" type="text" id="name" name="name" :value="old('Nome')" required />
            <label class="form-label" for="name">Nome Completo</label>
          </div>

          <div class="form-outline mb-4">
            <input class="form-control" type="email" id="email" name="email" :value="old('email')" required />
            <label class="form-label" for="email">Email</label>
          </div>

          <div class="form-outline mb-4">
            <input class="form-control" type="password" id="password" name="password" required />
            <label class="form-label" for="password">Senha</label>
          </div>

          <div class="form-outline mb-4">
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required />
            <label class="form-label" for="password_confirmation">Confirme sua Senha</label>
          </div>
          
          <x-button class="btn btn-primary">
            {{ __('Cadastrar') }}
          </x-button>

          <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
              {{ __('Já é cadastrado?') }}
            </a>
          </div>
        </form>
      </div>
    </x-guest-layout>
  </div>
</body>
@endsection