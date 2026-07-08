@extends('layouts.guest')

@section('content')
    <h2 class="text-2xl font-bold text-gray-900 text-center mb-4">{{ __('auth.forgot_password') }}</h2>
    <p class="text-sm text-gray-600 text-center mb-8">{{ __('auth.forgot_password_description') }}</p>

    @if (session('status'))
        <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('auth.email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('email') border-red-500 @enderror">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition">
            {{ __('auth.send_reset_link') }}
        </button>

        <p class="text-center">
            <a href="{{ route('login') }}" class="text-sm text-primary-600 hover:text-primary-800">{{ __('auth.back_to_login') }}</a>
        </p>
    </form>
@endsection
