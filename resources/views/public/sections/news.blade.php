<section class="news">
    <div class="container news-container">
        <div class="news-head">
            <h3 class="news-title">{{ __('base.news_and_events') }}</h3>

            <div class="news-subtitle">Stay informed about market insights, design trends and exclusive opportunities.</div>

            <div class="news-tags">
                <button type="button" class="btn news-tag-btn is-active">{{ __('base.all') }}</button>
                <button type="button" class="btn news-tag-btn">{{ __('base.blog') }}</button>
                <button type="button" class="btn news-tag-btn">{{ __('base.news') }}</button>
                <button type="button" class="btn news-tag-btn">{{ __('base.event') }}</button>
            </div>
        </div>

        <div class="news-list">
            @for($i = 0; $i < 6; $i++)
                <article class="article-card">
                    <h6 class="article-card-title"><span>The Rise of Eco-Towers in Zurich</span></h6>
                    <div class="line-clamp-3 article-card-description">
                        <p>How sustainable architecture is reshaping Swiss luxury real estate.</p>
                    </div>
                    <div class="article-card-info">
                        <time datetime="2025-07-25">25 Jul 2025</time>
                        <div class="article-card-tag">{{ __('base.blog') }}</div>
                    </div>
                    <a href="#" class="article-card-link">The Rise of Eco-Towers in Zurich</a>
                </article>
            @endfor
        </div>
    </div>
</section>
