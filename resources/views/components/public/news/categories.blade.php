@props([
    'categories',
    'updateListId' => 'news-list',
    'updatePaginationId' => 'news-pagination'
])

<div id="news-categories-tabs" data-update-list-id="{{ $updateListId }}" data-update-pagination-id="{{ $updateListId }}" class="news-categories">
    <button data-category-id="all" type="button" class="btn news-category-btn is-active">{{ __('base.all') }}</button>

    @foreach($categories as $category)
        @if($category->articles->isNotEmpty())
            <button data-category-id="{{ $category->id }}" type="button" class="btn news-category-btn">{{ $category->name }}</button>
        @endif
    @endforeach
</div>
