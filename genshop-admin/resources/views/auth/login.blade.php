@extends('template.principal')

@section('content')

<body>
  <x-guest-layout>
    <x-auth-card>
      <x-slot name="logo">
        <a href="/"></a>
      </x-slot>

      <x-auth-session-status class="mb-4" :status="session('status')" />

      <x-auth-validation-errors class="mb-4" :errors="$errors" />
      <div class="container py-5">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-outline mb-4">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
          </div>

          <div class="form-outline mb-4">
            <x-label for="password" :value="__('Senha')" />
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
          </div>

          <!-- Remember Me -->
          <div class="form-outline mb-4">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
              <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar-me') }}</span>
            </label>
          </div>

          <x-button class="btn btn-primary">
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
    </x-auth-card>
  </x-guest-layout>
</body>
@endsection