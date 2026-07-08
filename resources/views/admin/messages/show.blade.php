@extends('layouts.admin')

@section('title', 'Message Detail')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Message Detail</h1>
            <p class="text-gray-600 mt-1">From {{ $message->name }}</p>
        </div>
        <a href="{{ route('admin.messages.index') }}">
            <x-ui.button variant="secondary">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Messages
            </x-ui.button>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">{{ $message->subject }}</h2>
                <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $message->message }}</p>
            </x-ui.card>

            @if($message->is_replied && $message->reply_message)
                <x-ui.card>
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Reply</h2>
                        <span class="text-xs text-gray-500">{{ $message->replied_at ? $message->replied_at->format('M d, Y h:i A') : '' }}</span>
                    </div>
                    <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $message->reply_message }}</p>
                    @if($message->replier)
                        <p class="mt-3 text-xs text-gray-500">Replied by {{ $message->replier->name }}</p>
                    @endif
                </x-ui.card>
            @endif
        </div>

        <div class="space-y-6">
            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h2>
                <dl class="space-y-3">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $message->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $message->email }}" class="text-blue-600 hover:underline">{{ $message->email }}</a>
                        </dd>
                    </div>
                    @if($message->phone)
                        <div>
                            <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <a href="tel:{{ $message->phone }}" class="text-blue-600 hover:underline">{{ $message->phone }}</a>
                            </dd>
                        </div>
                    @endif
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Sent At</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $message->created_at->format('M d, Y h:i A') }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Status</dt>
                        <dd class="mt-1">
                            @if(!$message->is_read)
                                <x-ui.badge variant="warning">Unread</x-ui.badge>
                            @elseif($message->is_replied)
                                <x-ui.badge variant="success">Replied</x-ui.badge>
                            @else
                                <x-ui.badge variant="info">Read</x-ui.badge>
                            @endif
                        </dd>
                    </div>
                </dl>
            </x-ui.card>

            @if(!$message->is_replied)
                <x-ui.card>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Send Reply</h2>
                    <form action="{{ route('admin.messages.reply', $message) }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="reply_message" class="block text-sm font-medium text-gray-700 mb-1">Reply Message</label>
                                <textarea name="reply_message" id="reply_message" rows="6" required
                                          class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500"></textarea>
                            </div>
                            <x-ui.button type="submit" class="w-full">
                                <i class="fas fa-reply mr-2"></i>
                                Send Reply
                            </x-ui.button>
                        </div>
                    </form>
                </x-ui.card>
            @endif
        </div>
    </div>
@endsection
