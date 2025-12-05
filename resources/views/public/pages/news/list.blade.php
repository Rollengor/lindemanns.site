@foreach($newsArticles as $article)
    <x-public.news.article-card :article="$article"/>
@endforeach
