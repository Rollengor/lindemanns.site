@props([
    'article'
])

<article class="article-card">
    <div class="article-card-wrapper">
        <h6 class="article-card-title"><span>{{ $article->title }}</span></h6>
        <div class="line-clamp-3 article-card-description">
            @if($article->short_description)
                <p>{{ $article->short_description }}</p>
            @elseif($article->description)
                {{ $article->description }}
            @endif
        </div>
        <div class="article-card-info">
            <time datetime="{{ $article->created_at->format('Y-m-d') }}">{{ $article->created_at->translatedFormat('d M Y') }}</time>
            <div class="article-card-tag">{{ $article->first_category->name }}</div>
        </div>
        <a href="{{ route('public.news.article', $article->slug) }}" class="article-card-link">{{ $article->title }}</a>
    </div>

    <x-public.icon.building-outline class="article-card-icon"/>
</article>
