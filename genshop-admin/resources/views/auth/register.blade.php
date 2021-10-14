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
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-outline mb-4">
                <x-label for="name" :value="__('Nome')" />
                <x-input id="name" placeholder="Seu Nome Completo" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="form-outline mb-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" placeholder="joao@gmail.com" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="form-outline mb-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" placeholder="*********" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <div class="form-outline mb-4">
                <x-label for="password_confirmation" :value="__('Confirme sua senha')" />

                <x-input id="password_confirmation" placeholder="*********" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <x-button class="btn btn-primary">
                    {{ __('Registrar') }}
                </x-button>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já é cadastrado?') }}
                </a>

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
</div>
</body>
@endsection