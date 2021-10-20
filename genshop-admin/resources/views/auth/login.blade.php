@extends('template.principal')

@section('content')

<body>
  <div class="container py-5">
    <x-guest-layout>
      <x-auth-card>
        <x-slot name="logo">
          <a href="/"></a>
        </x-slot>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h1 class="pb-4">Login</h1>
        
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
      </x-auth-card>
    </x-guest-layout>
  </div>
</body>
@endsection