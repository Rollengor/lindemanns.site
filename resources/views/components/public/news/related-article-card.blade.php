@props([
    'article'
])

<div class="related-article-card">
    <h3 class="related-article-card-title">{{ $article->title }}</h3>
    <div class="related-article-card-info">
        <time datetime="{{ $article->created_at->format('Y-m-d') }}">{{ $article->created_at->translatedFormat('d M Y') }}</time>
        <div>{{ $article->first_category->name }}</div>
    </div>
    <a href="{{ route('public.news.article', $article->slug) }}" class="primary-link"></a>
</div>
