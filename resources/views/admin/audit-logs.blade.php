@extends('layouts.admin')

@section('title', 'Audit Logs')

@section('content')
    <div class="mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Audit Logs</h1>
            <p class="text-gray-600 mt-1">Track all system activities and changes.</p>
        </div>
    </div>

    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-3 font-medium text-gray-700">User</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Action</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Model Type</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Model ID</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Changes</th>
                        <th class="px-4 py-3 font-medium text-gray-700">IP Address</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $log->user?->name ?? 'System' }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium
                                    @switch($log->action)
                                        @case('created') bg-green-100 text-green-700 @break
                                        @case('updated') bg-blue-100 text-blue-700 @break
                                        @case('deleted') bg-red-100 text-red-700 @break
                                        @default bg-gray-100 text-gray-700
                                    @endswitch
                                ">
                                    {{ ucfirst($log->action) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-600 text-xs">{{ class_basename($log->model_type) }}</td>
                            <td class="px-4 py-3 text-gray-600 font-mono text-xs">{{ $log->model_id }}</td>
                            <td class="px-4 py-3 max-w-xs">
                                @if($log->old_values || $log->new_values)
                                    <details class="group">
                                        <summary class="cursor-pointer text-xs text-blue-600 hover:text-blue-800 select-none">
                                            <i class="fas fa-chevron-right group-open:rotate-90 transition-transform mr-1"></i>
                                            View changes
                                        </summary>
                                        <div class="mt-2 space-y-2 text-xs">
                                            @if($log->old_values)
                                                <div>
                                                    <span class="font-medium text-gray-500">Old:</span>
                                                    <pre class="mt-1 bg-gray-50 p-2 rounded border border-gray-200 overflow-x-auto text-gray-700">{{ json_encode($log->old_values, JSON_PRETTY_PRINT) }}</pre>
                                                </div>
                                            @endif
                                            @if($log->new_values)
                                                <div>
                                                    <span class="font-medium text-gray-500">New:</span>
                                                    <pre class="mt-1 bg-gray-50 p-2 rounded border border-gray-200 overflow-x-auto text-gray-700">{{ json_encode($log->new_values, JSON_PRETTY_PRINT) }}</pre>
                                                </div>
                                            @endif
                                        </div>
                                    </details>
                                @else
                                    <span class="text-gray-400 text-xs">No data</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-gray-600 text-xs font-mono">{{ $log->ip_address ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600 whitespace-nowrap">
                                {{ $log->created_at->format('M d, Y h:i A') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                No audit logs found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($logs->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $logs->links() }}
            </div>
        @endif
    </x-ui.card>
@endsection
