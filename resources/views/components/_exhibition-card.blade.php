<div class="card shadow">
  <a href="{{ route("exhibitions.show", $exhibition->slug) }}">
    <img src="{{ $exhibition->thumbnail }}" class="card-img-top">
  </a>
  <div class="card-pameran-body">
    <div class="d-flex justify-content-between">
      <h5 class="card-pameran-title">{{ $exhibition->name }}</h5>
      <div class="card-pameran-date text-orange">{{ date_format(date_create($exhibition->date), "l, d F Y") }}</div>
    </div>
    <p class="card-pameran-price text-red">Rp{{ number_format($exhibition->price) }}</p>
    <p class="card-pameran-author text-grey"><i class="fas fa-user"></i> {{ $exhibition->artist->name }}</p>
  </div>
</div>