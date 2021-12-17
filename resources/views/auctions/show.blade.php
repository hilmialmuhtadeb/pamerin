<x-app-layout title="{{ $auction->name }}">

    @slot('style')
    <style>
        .breadcrumb-item>a {
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
            text-transform: uppercase;
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
        .bidding-button {
          background-color: #F6AE2D;
          color: white;
          font-size: 14px;
          font-weight: 700;
          transition: .2s;
        }
        .bidding-button:hover {
          background-color: #cf8d11;
          color: white;
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
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="title-2 text-black"><b>Start Bid :</b></span><br>
                        </div>
                        <div class="col-md-5">
                            <span class="title-2 text-red">Rp.{{ number_format($auction->price) }}</span><br>
                        </div>
                    </div>
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
                    <div class="col-12 rounded border my-2">
                        <span class="text-black flex justify-start my-2">Rp.</span>
                    
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="#" method="post">
                                @csrf
                                <div class="form-group justify-content-beetwen  ">
                                    <input type="text" class="form-control" name="bid" onkeypress="return event.charCode >= 48 && event.charCode <=57" placeholder="Tawaran Anda">
                                </div>
                            </form>
                        </div>
                        <div class="d-grid col-md-4">
                        <button type="submit" class="bidding-button btn rounded-3">Ajukan Tawaran</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>