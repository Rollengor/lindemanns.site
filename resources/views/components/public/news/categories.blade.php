@props([
    'categories',
    'updateListId' => 'news-list',
    'updatePaginationId' => 'news-pagination',
    'anchorSectionId' => 'news',
    'limitArticles' => null,
])

<div
    id="news-categories-tabs"
    data-update-url="{{ route('public.news') }}"
    data-update-list-id="{{ $updateListId }}"
    data-update-pagination-id="{{ $updatePaginationId }}"
    data-anchor-section-id="{{ $anchorSectionId }}"
    @if($limitArticles)
        data-limit-articles="{{ $limitArticles }}"
    @endif
    class="news-categories">
    <button data-category data-id="all" type="button" class="btn news-category-btn is-active">{{ __('base.all') }}</button>

    @foreach($categories as $category)
        @if($category->articles->isNotEmpty())
            <button data-category data-id="{{ $category->id }}" type="button" class="btn news-category-btn">{{ $category->name }}</button>
        @endif
    @endforeach
</div>
