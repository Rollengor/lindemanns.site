<section class="news">
    <div class="container news-container">
        <div class="news-head">
            <h3 class="news-title">{{ __('base.news_and_events') }}</h3>

            <div class="news-subtitle">Stay informed about market insights, design trends and exclusive opportunities.</div>

            <x-public.news.categories :categories="$newsCategories"/>
        </div>

        <div class="news-list">
            @foreach($newsArticles as $article)
                <x-public.news.article-card :article="$article"/>
            @endforeach
        </div>
    </div>
</section>
