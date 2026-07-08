@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Users</h1>
            <p class="text-gray-600 mt-1">Manage system users and their roles.</p>
        </div>
    </div>

    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-3 font-medium text-gray-700">Name</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Email</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Roles</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Status</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $user->email }}</td>
                            <td class="px-4 py-3">
                                <div class="flex flex-wrap gap-1">
                                    @foreach($user->roles as $role)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-primary-100 text-primary-700">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                    @if($user->roles->isEmpty())
                                        <span class="text-gray-400 text-xs">No roles</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                @if($user->is_active)
                                    <x-ui.badge variant="success">Active</x-ui.badge>
                                @else
                                    <x-ui.badge variant="danger">Inactive</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $users->links() }}
            </div>
        @endif
    </x-ui.card>
@endsection
