<div class="card shadow">
  <a href="{{ route("artworks.show", $artwork->slug) }}">
    <img src="{{asset($artwork->thumbnail) }}" class="card-img-top" height="200px">
  </a>
  <div class="card-pameran-body">
    <p class="card-pameran-category text-orange">{{ $artwork->category->name }}</p>
    <h5 class="card-pameran-title">{{ $artwork->name }}</h5>
    <p class="card-pameran-price text-red">Rp{{ number_format($artwork->price) }}</p>
    <p class="card-pameran-author text-grey"><i class="fas fa-user"></i> {{ $artwork->artist->name }}</p>
  </div>
</div>