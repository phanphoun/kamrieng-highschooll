@extends('layouts.admin')

@section('title', 'Enrollment Details')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Enrollment Details</h1>
            <p class="text-gray-600 mt-1">Tracking Code: <span class="font-mono font-medium">{{ $enrollment->tracking_code }}</span></p>
        </div>
        <a href="{{ route('admin.enrollments.index') }}">
            <x-ui.button variant="secondary">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </x-ui.button>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <x-ui.card>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-900">Student Information</h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                          style="background-color: {{ $enrollment->status?->color }}20; color: {{ $enrollment->status?->color }}">
                        {{ $enrollment->status?->name_en ?? 'Pending' }}
                    </span>
                </div>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Name (EN)</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->student_name_en }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Name (KH)</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->student_name_kh ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Birth</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->date_of_birth ? $enrollment->date_of_birth->format('M d, Y') : '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ ucfirst($enrollment->gender) ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->phone ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->email ?? '-' }}</dd>
                    </div>
                    <div class="sm:col-span-2">
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Address</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->address ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Previous School</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->previous_school ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Grade Applying For</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->grade_applying_for }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Academic Year</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->academic_year }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->created_at->format('M d, Y h:i A') }}</dd>
                    </div>
                </dl>
            </x-ui.card>

            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Parent / Guardian Information</h2>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Parent Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->parent_name ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Parent Phone</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->parent_phone ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Parent Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->parent_email ?? '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Parent Occupation</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->parent_occupation ?? '-' }}</dd>
                    </div>
                </dl>
            </x-ui.card>

            @if($enrollment->documents)
                <x-ui.card>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Documents</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach($enrollment->documents as $document)
                            <a href="{{ Storage::url($document) }}" target="_blank"
                               class="flex items-center gap-2 p-3 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100 transition">
                                <i class="fas fa-file text-gray-400"></i>
                                <span class="text-sm text-gray-700 truncate">{{ basename($document) }}</span>
                            </a>
                        @endforeach
                    </div>
                </x-ui.card>
            @endif

            @if($enrollment->additional_notes)
                <x-ui.card>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Additional Notes</h2>
                    <p class="text-sm text-gray-700">{{ $enrollment->additional_notes }}</p>
                </x-ui.card>
            @endif
        </div>

        <div class="space-y-6">
            <x-ui.card>
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Update Status</h2>
                <form action="{{ route('admin.enrollments.status', $enrollment) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-4">
                        <div>
                            <label for="status_id" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status_id" id="status_id" required
                                    class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $enrollment->status_id == $status->id ? 'selected' : '' }}>
                                        {{ $status->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="remarks" class="block text-sm font-medium text-gray-700 mb-1">Remarks</label>
                            <textarea name="remarks" id="remarks" rows="4"
                                      class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">{{ $enrollment->remarks }}</textarea>
                        </div>
                        <x-ui.button type="submit" class="w-full">
                            <i class="fas fa-check mr-2"></i>
                            Update Status
                        </x-ui.button>
                    </div>
                </form>
            </x-ui.card>

            @if($enrollment->reviewer)
                <x-ui.card>
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Review Info</h2>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Reviewed By</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $enrollment->reviewer->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Reviewed At</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $enrollment->reviewed_at ? $enrollment->reviewed_at->format('M d, Y h:i A') : '-' }}
                            </dd>
                        </div>
                        @if($enrollment->remarks)
                            <div>
                                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Remarks</dt>
                                <dd class="mt-1 text-sm text-gray-700">{{ $enrollment->remarks }}</dd>
                            </div>
                        @endif
                    </dl>
                </x-ui.card>
            @endif
        </div>
    </div>
@endsection
