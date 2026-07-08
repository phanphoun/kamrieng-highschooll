@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Edit User</h1>
        <p class="text-gray-600 mt-1">Update user information and role.</p>
    </div>

    <x-ui.card>
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    <p class="mt-1 text-xs text-gray-500">Leave blank to keep current password.</p>
                    @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role <span class="text-red-500">*</span></label>
                    <select id="role" name="role" required
                            class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                        <option value="">Select a role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ old('role', $user->roles->first()?->name) == $role->name ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500">
                    @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $user->is_active) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                    <span class="text-sm text-gray-700">Active</span>
                </label>
            </div>

            <div class="mt-8 flex items-center gap-4">
                <x-ui.button type="submit">
                    <i class="fas fa-save mr-2"></i>
                    Update
                </x-ui.button>
                <a href="{{ route('admin.users.index') }}">
                    <x-ui.button variant="secondary" type="button">
                        Cancel
                    </x-ui.button>
                </a>
            </div>
        </form>
    </x-ui.card>
@endsection
