@extends("layouts.app")

@section("content")
  <section class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="w-100" style="max-width: 400px;">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <!-- Email Address -->
      <div class="mb-3">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
      </div>

      <!-- Password -->
      <div class="mb-3">
      <x-input-label for="password" :value="__('Password')" />
      <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
      </div>

      <!-- Remember Me -->
      <div class="mb-3 form-check">
      <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
      <label for="remember_me" class="form-check-label">
        {{ __('Remember me') }}
      </label>
      </div>

      <!-- Actions -->
      <div class="d-flex justify-content-between align-items-center">
      @if (Route::has('password.request'))
      <a class="text-decoration-underline text-sm text-secondary" href="{{ route('password.request') }}">
      {{ __('Forgot your password?') }}
      </a>
    @endif

      <x-primary-button class="btn btn-primary">
        {{ __('Log in') }}
      </x-primary-button>
      </div>
    </form>
    </div>
  </section>
@endsection