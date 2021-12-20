<div class="card-artikel">
    <a href="{{ route('articles.show', $article->slug) }}">
        <img src="{{asset('/img/dummy/artikel.jpg')}}" class="card-img-top">
    </a>
    <div class="card-artikel-body">
        <h5 class="card-artikel-title text-center">{{ $article->title }}</h5>
    </div>
</div>