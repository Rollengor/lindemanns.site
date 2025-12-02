@props([
    'categories'
])

<div class="news-categories">
    <button type="button" class="btn news-category-btn is-active">{{ __('base.all') }}</button>

    @foreach($categories as $category)
        <button type="button" class="btn news-category-btn">{{ $category->name }}</button>
    @endforeach
</div>
