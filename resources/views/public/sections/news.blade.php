<section class="news">
    <div class="container news-container">
        <div class="news-head">
            <h3 class="news-title">{{ __('base.news_and_events') }}</h3>

            <div class="news-subtitle">Stay informed about market insights, design trends and exclusive opportunities.</div>

            <x-public.news.tags/>
        </div>

        <div class="news-list">
            @for($i = 0; $i < 6; $i++)
                <x-public.news.article-card/>
            @endfor
        </div>
    </div>
</section>
