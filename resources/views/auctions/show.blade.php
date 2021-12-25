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
                    <img src="{{asset($auction->thumbnail)}}" class="img-fluid img-detail rounded">
                </div>

                <div class="card-info p-3" style="margin-top: 25px;">

                    <h1 class="detail-title">{{ $auction->name }}</h1>
                    <div class="row">
                        <div class="col-sm-4">
                            <span class="title-4 text-black"><b>Harga Lelang :</b></span><br>
                        </div>
                        <div class="col-md-5">
                            <input type="hidden" name="price" value="{{ $auction->price }}">
                            <span class="title-2 text-red price-show">Rp {{ number_format($auction->price) }}</span><br>
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
                    <h1 class="detail-title">Lelang</h1>
                    <hr>
                    <div class="bidder-box">
                        @foreach($auction->user as $bid)
                            <div class="col-12 rounded border my-2">
                                <span class="text-black flex justify-start my-2">Rp {{ number_format($bid->pivot->bidder) }} updated by {{ $bid->pivot->name }}</span>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ route('auctions.store') }}" method="post">
                                @csrf
                                <div class="form-group justify-content-beetwen  ">
                                    <input type="hidden" name="slug_auctions" value="{{ $auction->slug }}">
                                    <input type="hidden" name="auction_id" value="{{ $auction->id }}">
                                    <input type="number" class="form-control" name="bidder" placeholder="Tawaran Anda">
                                </div>
                                @error('bidder')
                                    {{ $message }}
                                @enderror
                                <br>
                                <button type="submit" class="bidding-button btn rounded-3">Ajukan Tawaran</button>
                            </form>
                        </div>
                        <div class="d-grid col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(document).ready(function() {

        });
        
        function add_bid(price,name){
            let bid_element =
             `<div class="col-12 rounded border my-2">
                <span class="text-black flex justify-start my-2">Rp ${price} updated by ${name}</span>
            </div>`;
            $('.bidder-box').append(bid_element);
        }
        function bid(){

        }
    </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script>

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('9428a1aa57e130fe3c16', {
            cluster: 'ap1'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('auction-submitted', function(data) {
                let auction_id = $('input[name=auction_id]').val();
                let price_now = $('input[name=price]').val();
                // alert(price_now);
                // alert(parseInt(data['bidder']) > parseInt(price_now));
                if(auction_id == data['auction_id']){
                    if(parseInt(data['bidder']) > parseInt(price_now)){
                        $('input[name=price]').val(data['bidder']);
                        $('.price-show').html(data['bidder']);
                    }
                    add_bid(data['bidder'],data['name']);
                }

            });
        </script> 
</x-app-layout>