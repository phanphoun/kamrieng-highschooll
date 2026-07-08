@extends('layouts.admin')

@section('title', __('admin.activities_management'))

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ __('admin.activities_management') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('admin.activities_management_description') }}</p>
        </div>
        <a href="{{ route('admin.activities.create') }}">
            <x-ui.button>
                <i class="fas fa-plus mr-2"></i>
                {{ __('admin.create_activity') }}
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
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.location') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.activity_date') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.status') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities as $activity)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $activity->title_en }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $activity->category }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $activity->location ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ $activity->activity_date ? $activity->activity_date->format('M d, Y') : '-' }}
                            </td>
                            <td class="px-4 py-3">
                                @if($activity->is_published)
                                    <x-ui.badge variant="success">{{ __('admin.published') }}</x-ui.badge>
                                @else
                                    <x-ui.badge variant="warning">{{ __('admin.draft') }}</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.activities.edit', $activity) }}" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" onsubmit="return confirm('{{ __('admin.confirm_delete') }}')">
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
                                {{ __('admin.no_activities') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($activities->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $activities->links() }}
            </div>
        @endif
    </x-ui.card>
@endsection
