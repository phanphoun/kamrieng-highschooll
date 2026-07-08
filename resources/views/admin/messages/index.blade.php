@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Messages</h1>
            <p class="text-gray-600 mt-1">Manage contact form submissions.</p>
        </div>
    </div>

    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-3 font-medium text-gray-700">Name</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Email</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Subject</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Status</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Date</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 {{ !$message->is_read ? 'bg-primary-50/50' : '' }}">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    @if(!$message->is_read)
                                        <span class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></span>
                                    @endif
                                    <span class="text-gray-900 font-medium">{{ $message->name }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $message->email }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $message->subject }}</td>
                            <td class="px-4 py-3">
                                @if(!$message->is_read)
                                    <x-ui.badge variant="warning">Unread</x-ui.badge>
                                @elseif($message->is_replied)
                                    <x-ui.badge variant="success">Replied</x-ui.badge>
                                @else
                                    <x-ui.badge variant="info">Read</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ $message->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.messages.show', $message) }}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                No messages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($messages->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $messages->links() }}
            </div>
        @endif
    </x-ui.card>
@endsection
