<x-app-layout title="{{ $artwork->name }}">

  @slot('style')
      <style>
        .breadcrumb-item>a{
          text-decoration: none;
          color: #F6AE2D;
        }
        .img-detail {
          min-width: 100%;
        }
        .card-info {
          background-color: rgba(255, 255, 255, 0.6);
          border-radius: 5px;
          box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.267);
        }
        .detail-title {
          font-size: 25px;
          font-weight: 800;
        }
        .title-2 {
          font-size: 22px;
          font-weight: 700;
        }
        .detail-description {
          font-size: 12px;
        }
        .detail-button {
          background-color: #F6AE2D;
          color: white;
          font-size: 14px;
          font-weight: 700;
          transition: .2s;
        }
        .detail-button:hover {
          background-color: #cf8d11;
          color: white;
        }
        .detail-user {
          color: #828282;
          font-size: 14px;
        }
        .detail-category {
          font-size: 14px;
          font-weight: 400;
          text-decoration: none;
          color: #F6AE2D;
          text-transform:uppercase;
        }
        .detail-category:hover {
          color: #cf8d11;
        }
        .detail-info {
          margin: 20px 0;
        }
        .detail-info>p {
          margin: 0;
          font-size: 12px;
          font-weight: 600;
        }
      </style>
  @endslot

  <div class="container">

    <div class="row mb-4">
      @include('components._breadcrumbs')
    </div>

    <div class="row justify-content-center mb-3">

      <div class="col-md-5">
      <div class="row">
        <div class="card-info p-3">
        <img src="{{asset($artwork->thumbnail) }}" class="img-detail img-fluid rounded">
        </div>

      </div>
      </div>

      <div class="col-md-5">
        <div class="card-info p-3">

          <a href="{{ route('categories.show', $artwork->category->slug) }}" class="detail-category m-0">KATEGORI : {{ $artwork->category->name }}</a>
          <h1 class="detail-title">{{ $artwork->name }}</h1>
          <p class="title-2 text-red">Rp {{ number_format($artwork->price) }}</p>
          <div class="detail-info">
            <p>Ukuran : {{ $artwork->size}}</p>
            <p>Media : {{ $artwork->media }}</p>
            <p>Tahun Dibuat : {{ $artwork->year }}</p>
          </div>
          <p class="detail-description">{{ $artwork->description }}</p>
          <div class="d-grid">
            <form action="{{ route('details.store') }}" method="post">
              @csrf
              <input type="hidden" name="artwork_id" value="{{ $artwork->id }}">
              <div class="d-grid">
                <button type="submit" class="detail-button btn rounded-3">Masukkan Keranjang</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col">
        <h2 class="title-2">Tentang Seniman</h2>
        <p class="detail-user">
          <i class="fas fa-user"></i> {{ $artwork->artist->name }}, {{ $artwork->artist->region }}
        </p>
      </div>
    </div>
    
  </div>
  
</x-app-layout>