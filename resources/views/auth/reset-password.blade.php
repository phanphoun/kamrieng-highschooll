@extends('layouts.app')

@section('title', 'Enter Reset Code — Kamrieng High School')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-center text-gray-800">Enter Reset Code</h1>
        <p class="text-center text-gray-500 mb-6">
            We sent a 6-digit code to <span class="font-semibold text-gray-700">{{ $email }}</span>
        </p>

        @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.verify') }}" class="space-y-4">
            @csrf

            <div>
                <label for="code" class="block text-sm font-medium text-gray-700 mb-1">Reset Code</label>
                <input id="code" type="text" name="code" value="{{ old('code') }}" required autofocus
                       inputmode="numeric" pattern="[0-9]{6}" maxlength="6" placeholder="123456" autocomplete="one-time-code"
                       class="w-full rounded-lg border border-gray-200 px-3 py-2 text-center text-2xl tracking-[0.5em] font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('code')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700">
                Verify Code
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Didn't get a code?
            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Send again</a>
        </p>
    </div>
</div>
@endsection
