@extends('template.principal')

@section('content')

<body>
  <div class="container py-5 text-center">
    <x-guest-layout>
      <div class="card p-4 bg-card card-login">
        <x-slot name="logo">
          <a href="/"></a>
        </x-slot>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="text-center mb-5">
          <img src="{{ asset('storage/images/genshop.png') }}" class="img-fluid logo-genshop" />
        </div>
        
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-outline mb-4">
            <input class="form-control" type="email" id="email" name="email" :value="old('email')" required />
            <label class="form-label" for="email">Email</label>
          </div>

          <div class="form-outline mb-4">
            <input class="form-control" type="password" id="password" name="password" required />
            <label class="form-label" for="password">Senha</label>
          </div>

          <!-- Remember Me -->
          <div class="form-outline mb-4 d-flex">
            <label for="remember_me" class="mr-auto">
              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
              <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar-me') }}</span>
            </label>
          </div>

          <x-button class="btn btn-lg w-100 btn-primary">
            {{ __('Entrar') }}
          </x-button>

          <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
              {{ __('Esqueceu sua senha?') }}
            </a>
            @endif
        </form>
      </div>
    </x-guest-layout>
  </div>
</body>
@endsection