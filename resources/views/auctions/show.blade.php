<x-app-layout title="{{ $auction->name }}">

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

    <div class="row justify-content-center mb-2">

    <div class="col-md-5">  
      <div class="card-info p-3">
        <img src="{{ $auction->thumbnail }}" class="img-fluid img-detail rounded">
      </div>

        <div class="card-info p-3" style="margin-top: 25px;">

          <h1 class="detail-title">{{ $auction->name }}</h1>
          <p class="title-2 text-red">Start Bid : Rp{{ number_format($auction->price) }}</p>
          <div class="detail-info">
            <p>Ukuran : {{ $auction->width }} x {{ $auction->height }} cm</p>
            <p>Media : {{ $auction->media }}</p>
            <p>Tahun Dibuat : {{ $auction->year }}</p>
          </div>
          <p class="detail-description">{{ $auction->description }}</p>
        </div>
      </div>
      <div class="col-md-5">
        <div class="h-100 card-info p-3">
          <h1 class="detail-title">Bidder</h1>
          <hr>
          
        </div>
        </div>
      </div>
    </div>
  
</x-app-layout>