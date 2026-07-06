@extends('layouts.app')

@section('title', 'Register — Kamrieng High School')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-center text-gray-800">វិទ្យាល័យកំរៀង</h1>
        <p class="text-center text-gray-500 mb-6">Create a staff account</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select id="role" name="role" required
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select a role</option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="content_editor" {{ old('role') === 'content_editor' ? 'selected' : '' }}>Content Editor</option>
                </select>
                @error('role')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-password-input name="password" label="Password" />

            <x-password-input name="password_confirmation" label="Confirm Password" />

            <button type="submit"
                    class="w-full rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white hover:bg-blue-700">
                Register
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
