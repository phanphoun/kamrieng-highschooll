@extends('layouts.app')

@section('title', 'Login — Kamrieng High School')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-center text-gray-800">វិទ្យាល័យកំរៀង</h1>
        <p class="text-center text-gray-500 mb-6">Sign in to your account</p>

        @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm">
                {{ session('status') }}
            </div>
        @endif

        @error('auth')
            <div class="mb-4 flex items-start gap-2 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v3.75m0 3h.008v.008H12v-.008zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ $message }}</span>
            </div>
        @enderror

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-password-input name="password" label="Password" />

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    Remember me
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                    Forgot password?
                </a>
            </div>

            <button type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
        </p>
    </div>
</div>
@endsection
