@extends('layouts.admin')

@section('title', 'Enrollments')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Enrollments</h1>
            <p class="text-gray-600 mt-1">Manage student enrollment applications.</p>
        </div>
    </div>

    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-3 font-medium text-gray-700">Tracking Code</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Student Name</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Grade</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Academic Year</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Status</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Submitted Date</th>
                        <th class="px-4 py-3 font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $application)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-900 font-mono text-xs">{{ $application->tracking_code }}</td>
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $application->student_name_en }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $application->grade_applying_for }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $application->academic_year }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                      style="background-color: {{ $application->status?->color }}20; color: {{ $application->status?->color }}">
                                    {{ $application->status?->name_en ?? 'Pending' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ $application->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.enrollments.show', $application) }}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                No enrollments found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($applications->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $applications->links() }}
            </div>
        @endif
    </x-ui.card>
@endsection
