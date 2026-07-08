@extends('layouts.guest')

@section('title', __('auth.login'))

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">{{ __('auth.login') }}</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('email') border-red-500 @enderror">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.password') }}</label>
            <input id="password" type="password" name="password" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('password') border-red-500 @enderror">
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                <span class="ml-2 text-sm text-gray-600">{{ __('auth.remember_me') }}</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm text-primary-600 hover:text-primary-800">{{ __('auth.forgot_password') }}</a>
        </div>

        <button type="submit" class="w-full px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition">
            {{ __('auth.login') }}
        </button>

        <p class="text-center text-sm text-gray-600">
            {{ __('auth.no_account') }}
            <a href="{{ route('register') }}" class="text-primary-600 hover:text-primary-800 font-medium">{{ __('auth.register') }}</a>
        </p>
    </form>
@endsection
