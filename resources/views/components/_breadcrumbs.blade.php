<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    @isset($exhibition)
      <li class="breadcrumb-item"><a href="{{ route('exhibitions.index') }}">Pameran</a></li>
      <li class="breadcrumb-item text-black">{{ $exhibition->name }}</li>
    @endisset
    @isset($artwork)
    <li class="breadcrumb-item"><a href="{{ route('artworks.index') }}">Karya</a></li>
    <li class="breadcrumb-item text-black">{{ $artwork->name }}</li>
    @endisset
    @isset($auction)
    <li class="breadcrumb-item"><a href="{{ route('auctions.index') }}">Lelang</a></li>
    <li class="breadcrumb-item text-black">{{ $auction->name }}</li>
    @endisset
  </ol>
</nav>