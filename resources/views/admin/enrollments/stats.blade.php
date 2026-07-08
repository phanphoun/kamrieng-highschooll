@extends('layouts.admin')

@section('title', 'Enrollment Statistics')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Enrollment Statistics</h1>
        <p class="text-gray-600 mt-1">Overview of enrollment application data.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <x-ui.card>
            <div class="text-center">
                <p class="text-sm font-medium text-gray-500">Total</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['total'] }}</p>
            </div>
        </x-ui.card>

        <x-ui.card>
            <div class="text-center">
                <p class="text-sm font-medium text-gray-500">Pending</p>
                <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $stats['pending'] }}</p>
            </div>
        </x-ui.card>

        <x-ui.card>
            <div class="text-center">
                <p class="text-sm font-medium text-gray-500">Approved</p>
                <p class="text-3xl font-bold text-green-600 mt-1">{{ $stats['approved'] }}</p>
            </div>
        </x-ui.card>

        <x-ui.card>
            <div class="text-center">
                <p class="text-sm font-medium text-gray-500">Rejected</p>
                <p class="text-3xl font-bold text-red-600 mt-1">{{ $stats['rejected'] }}</p>
            </div>
        </x-ui.card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-ui.card>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Status Breakdown</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="px-4 py-3 font-medium text-gray-700">Status</th>
                            <th class="px-4 py-3 font-medium text-gray-700">Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($statusBreakdown as $status)
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-900 font-medium">{{ $status->name_en }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $status->applications_count }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-8 text-center text-gray-500">No statuses found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-ui.card>

        <x-ui.card>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Monthly Data ({{ now()->year }})</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="px-4 py-3 font-medium text-gray-700">Month</th>
                            <th class="px-4 py-3 font-medium text-gray-700">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($monthlyData as $row)
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-900 font-medium">{{ $row->month }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $row->total }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-8 text-center text-gray-500">No data for this year.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-ui.card>
    </div>
@endsection
