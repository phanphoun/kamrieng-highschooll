@extends('layouts.app')

@section('title', __('navigation.enrollment'))

@section('content')
    <section class="bg-gradient-to-br from-primary-800 to-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ __('navigation.enrollment') }}</h1>
            <p class="text-xl text-primary-100">{{ __('messages.enrollment_description') ?? 'Apply for admission to EduKhmer High School.' }}</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-8">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.application_form') ?? 'Online Application Form' }}</h2>

                <form method="POST" action="{{ route('enrollment.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b">{{ __('messages.student_info') ?? 'Student Information' }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="student_name_en" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.student_name_en') ?? 'Full Name (English)' }} <span class="text-red-500">*</span></label>
                                <input type="text" id="student_name_en" name="student_name_en" value="{{ old('student_name_en') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition @error('student_name_en') border-red-500 @enderror">
                                @error('student_name_en') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="student_name_kh" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.student_name_kh') ?? 'Full Name (Khmer)' }}</label>
                                <input type="text" id="student_name_kh" name="student_name_kh" value="{{ old('student_name_kh') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                            </div>
                            <div>
                                <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.date_of_birth') ?? 'Date of Birth' }} <span class="text-red-500">*</span></label>
                                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition @error('date_of_birth') border-red-500 @enderror">
                                @error('date_of_birth') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.gender') ?? 'Gender' }} <span class="text-red-500">*</span></label>
                                <select id="gender" name="gender" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition @error('gender') border-red-500 @enderror">
                                    <option value="">{{ __('messages.select') ?? 'Select...' }}</option>
                                    <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>{{ __('messages.male') ?? 'Male' }}</option>
                                    <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>{{ __('messages.female') ?? 'Female' }}</option>
                                </select>
                                @error('gender') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.phone') }} <span class="text-red-500">*</span></label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition @error('phone') border-red-500 @enderror">
                                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.email') }}</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                            </div>
                            <div class="md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.address') }} <span class="text-red-500">*</span></label>
                                <textarea id="address" name="address" rows="2" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                                @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="previous_school" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.previous_school') ?? 'Previous School' }}</label>
                                <input type="text" id="previous_school" name="previous_school" value="{{ old('previous_school') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                            </div>
                            <div>
                                <label for="grade_applying_for" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.grade_applying') ?? 'Grade Applying For' }} <span class="text-red-500">*</span></label>
                                <select id="grade_applying_for" name="grade_applying_for" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition @error('grade_applying_for') border-red-500 @enderror">
                                    <option value="">{{ __('messages.select') ?? 'Select...' }}</option>
                                    @foreach($grades as $grade)
                                    <option value="{{ $grade }}" {{ old('grade_applying_for') === $grade ? 'selected' : '' }}>{{ $grade }}</option>
                                    @endforeach
                                </select>
                                @error('grade_applying_for') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="academic_year" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.academic_year') ?? 'Academic Year' }} <span class="text-red-500">*</span></label>
                                <select id="academic_year" name="academic_year" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition @error('academic_year') border-red-500 @enderror">
                                    <option value="">{{ __('messages.select') ?? 'Select...' }}</option>
                                    @foreach($academicYears as $year)
                                    <option value="{{ $year }}" {{ old('academic_year') === $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('academic_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b">{{ __('messages.parent_guardian_info') ?? 'Parent/Guardian Information' }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="parent_name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.parent_name') ?? 'Parent/Guardian Name' }} <span class="text-red-500">*</span></label>
                                <input type="text" id="parent_name" name="parent_name" value="{{ old('parent_name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition @error('parent_name') border-red-500 @enderror">
                                @error('parent_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="parent_phone" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.parent_phone') ?? 'Parent Phone' }} <span class="text-red-500">*</span></label>
                                <input type="text" id="parent_phone" name="parent_phone" value="{{ old('parent_phone') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition @error('parent_phone') border-red-500 @enderror">
                                @error('parent_phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="parent_email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.parent_email') ?? 'Parent Email' }}</label>
                                <input type="email" id="parent_email" name="parent_email" value="{{ old('parent_email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                            </div>
                            <div>
                                <label for="parent_occupation" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.parent_occupation') ?? 'Parent Occupation' }}</label>
                                <input type="text" id="parent_occupation" name="parent_occupation" value="{{ old('parent_occupation') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b">{{ __('messages.additional_info') ?? 'Additional Information' }}</h3>
                        <div>
                            <label for="additional_notes" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.additional_notes') ?? 'Additional Notes' }}</label>
                            <textarea id="additional_notes" name="additional_notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition">{{ old('additional_notes') }}</textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t">
                        <p class="text-sm text-gray-500"><span class="text-red-500">*</span> {{ __('messages.required_fields') ?? 'Required fields' }}</p>
                        <button type="submit" class="px-8 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition shadow-lg">
                            {{ __('messages.submit_application') ?? 'Submit Application' }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-8 text-center">
                <p class="text-gray-600">{{ __('messages.have_tracking_code') ?? 'Already have a tracking code?' }}</p>
                <a href="{{ route('enrollment.track') }}" class="text-primary-600 font-medium hover:text-primary-800 transition">{{ __('messages.track_application') ?? 'Track Your Application' }} &rarr;</a>
            </div>
        </div>
    </section>
@endsection
