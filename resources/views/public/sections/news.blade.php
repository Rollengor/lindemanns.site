<section class="news">
    <div class="container news-container">
        <div class="news-head">
            <h2 class="news-title">{{ __('base.news_and_events') }}</h2>

            {{--<div class="news-subtitle">Stay informed about market insights, design trends and exclusive opportunities.</div>--}}

            <x-public.news.categories :categories="$newsCategories" :limit-articles="6"/>
        </div>

        <div id="news-list" class="news-list">
            @foreach($newsArticles as $article)
                <x-public.news.article-card :article="$article"/>
            @endforeach
        </div>
    </div>
</section>
