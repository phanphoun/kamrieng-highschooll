@extends('layouts.admin')

@section('title', __('admin.news_management'))

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ __('admin.news_management') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('admin.news_management_description') }}</p>
        </div>
        <a href="{{ route('admin.news.create') }}">
            <x-ui.button>
                <i class="fas fa-plus mr-2"></i>
                {{ __('admin.create_news') }}
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
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.status') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.published_date') }}</th>
                        <th class="px-4 py-3 font-medium text-gray-700">{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-900 font-medium">{{ $article->title_en }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $article->category }}</td>
                            <td class="px-4 py-3">
                                @if($article->is_published)
                                    <x-ui.badge variant="success">{{ __('admin.published') }}</x-ui.badge>
                                @else
                                    <x-ui.badge variant="warning">{{ __('admin.draft') }}</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ $article->published_at ? $article->published_at->format('M d, Y') : '-' }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.news.edit', $article) }}" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $article) }}" method="POST" onsubmit="return confirm('{{ __('admin.confirm_delete') }}')">
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
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                {{ __('admin.no_news') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($articles->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $articles->links() }}
            </div>
        @endif
    </x-ui.card>
@endsection
