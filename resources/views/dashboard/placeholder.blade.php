@extends('layouts.app')

@section('title', 'Dashboard — Kamrieng High School')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8 text-center">
        @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm text-left">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold text-gray-800 mb-2">Welcome, {{ auth()->user()->name }}</h1>
        <p class="text-gray-500 mb-1">You are logged in as
            <span class="font-semibold text-blue-600">{{ str_replace('_', ' ', auth()->user()->role) }}</span>.
        </p>
        <p class="text-sm text-gray-400 mb-6">This placeholder page will become the real dashboard in US-03 / T-11.</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="rounded-lg bg-red-600 px-4 py-2 font-semibold text-white hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection
