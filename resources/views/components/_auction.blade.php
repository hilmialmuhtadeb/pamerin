<div class="card shadow">
  <a href="{{ route('auctions.show', $auction->slug) }}">
    <img src="{{asset($auction->thumbnail) }}" class="card-img-top">
  </a>
  <div class="card-pameran-body">
    <div class="d-flex justify-content-between">
      <h5 class="card-pameran-title">{{ $auction->name }}</h5>
    </div>
    <p class="card-pameran-author text-grey"><i class="fas fa-user"></i> {{ $auction->artist->name }}</p>
  </div>
</div>