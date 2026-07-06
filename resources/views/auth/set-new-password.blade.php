@extends('layouts.app')

@section('title', 'Set New Password — Kamrieng High School')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-center text-gray-800">Set New Password</h1>
        <p class="text-center text-gray-500 mb-6">Your code was verified. Choose a new password.</p>

        @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf

            <x-password-input name="password" label="New Password" :autofocus="true" />

            <x-password-input name="password_confirmation" label="Confirm New Password" />

            <button type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700">
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
