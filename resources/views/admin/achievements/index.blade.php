@extends('layouts.admin')

@section('title', __('admin.achievements_management'))

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ __('admin.achievements_management') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('admin.achievements_management_description') }}</p>
        </div>
        <a href="{{ route('admin.achievements.create') }}">
            <x-ui.button>
                <i class="fas fa-plus mr-2"></i>
                {{ __('admin.create_achievement') }}
            </x-ui.button>
        </a>
    </div>

    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.title') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.category') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.achieved_by') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.achieved_date') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.status') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($achievements as $achievement)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $achievement->title_en }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $achievement->category }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $achievement->achieved_by ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ $achievement->achieved_date ? $achievement->achieved_date->format('M d, Y') : '-' }}
                            </td>
                            <td class="px-4 py-3">
                                @if($achievement->is_published)
                                    <x-ui.badge variant="success">{{ __('admin.published') }}</x-ui.badge>
                                @else
                                    <x-ui.badge variant="warning">{{ __('admin.draft') }}</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.achievements.edit', $achievement) }}" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" onsubmit="return confirm('{{ __('admin.confirm_delete') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                {{ __('admin.no_achievements') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($achievements->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $achievements->links() }}
            </div>
        @endif
    </x-ui.card>
@endsection
