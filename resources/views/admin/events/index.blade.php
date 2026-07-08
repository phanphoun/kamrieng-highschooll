@extends('layouts.admin')

@section('title', 'Event Management')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Event Management</h1>
            <p class="text-gray-600 mt-1">Manage school events and activities</p>
        </div>
        <x-ui.button as="a" href="{{ route('admin.events.create') }}">
            <i class="fas fa-plus mr-2"></i> Create Event
        </x-ui.button>
    </div>

    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Title (EN)</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Type</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Event Date</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-500">Location</th>
                        <th class="text-center py-3 px-4 font-medium text-gray-500">Status</th>
                        <th class="text-right py-3 px-4 font-medium text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($events as $event)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $event->title_en }}</td>
                            <td class="py-3 px-4">
                                <x-ui.badge variant="info">{{ ucfirst($event->type) }}</x-ui.badge>
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $event->event_date->format('M d, Y') }}
                                @if($event->event_time)
                                    <span class="text-gray-400">at {{ $event->event_time->format('h:i A') }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-gray-600">{{ $event->location ?? '—' }}</td>
                            <td class="py-3 px-4 text-center">
                                @if($event->is_published)
                                    <x-ui.badge variant="success">Published</x-ui.badge>
                                @else
                                    <x-ui.badge variant="default">Draft</x-ui.badge>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.events.edit', $event) }}"
                                       class="text-gray-400 hover:text-primary-600 transition">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this event?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-600 transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-500">
                                <i class="fas fa-calendar text-4xl mb-3 block text-gray-300"></i>
                                <p>No events found. Create your first event!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>

    <div class="mt-6">
        {{ $events->links() }}
    </div>
@endsection
