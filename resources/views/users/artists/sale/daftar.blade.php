<x-app-layout title="Daftar Lelang">
    @slot('style')
    <style>
      .table-custom thead {
        border-top: 1px solid #B6B6B6;
        border-bottom: 1px solid #B6B6B6;
      }
      .table-custom th {
        padding: 20px 0;
        width: 20%;
        font-size: 16px;
        font-weight: 700;
      }
      .table-custom tbody {
        background-color: white;
      }
      .info-button {
        color: rgb(196, 196, 196);
        border-radius: 5px;
        transition: .3s;
      }
      .info-button:hover {
          color: rgb(0, 0, 0);
      }
      .submit-button {
        width: 100px;
        border-radius: 5px;
        padding: 1px ;
        font-weight: 600;
        font-size: 14px;
        border: 0;
        color: white;
      }  
      .modal-body {
        padding: 80px 0;
      }
      .modal-body p {
        margin: 0;
      }
    </style>
@endslot
    <div class="container">
  
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Daftar Lelang</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Lelang</th>
              <th scope="col" class="text-center">Nama Karya</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>   
            @foreach ($auctions as $auction)
            <tr>
              <td scope="row" class="align-middle text-center">L-{{ $auction->id }}</td>
              <td class="align-middle text-center">{{ $auction->name }}</td>
              <td class="align-middle text-center">
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-modal{{ $auction->id }}"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
      @foreach ($auctions as $auction)
      <x-modal name="info-modal{{ $auction->id }}">
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Pilih Pemenang</h1>
          <h1 class="text-center page-title">{{ $auction->name }}</h1>
          <span class="underline-page-title text-center"></span>
        </div>
        <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">Nama</th>
              <th scope="col" class="text-center">Harga</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>   

            @foreach ($auction->user as $au)
            <tr>
              {{-- $auction->id = field dari auction_user (auction_id -> id) --}}

              {{-- $au->id      = field dari auction_user (user_id -> id) --}}
              {{-- $au->name    = field dari auction_user (user_id -> name)  --}}

              {{-- $au->pivot->id     = field dari auction_user (id) --}}
              {{-- $au->pivot->name   = field dari auction_user (name) --}}
              {{-- $au->pivot->bidder = field dari auction_user (bidder)--}}

              <td scope="row" class="align-middle text-center">{{ $au->pivot->name }}</td>
              <td class="align-middle text-center">Rp {{ $au->pivot->bidder }}</td>
              @if ($au->pivot->status == 1)
              <form action="/artists/sale/daftar" method="post">
                @csrf
                {{-- id auction_user --}}
                <input type="hidden" name="id_auctionUser" value="{{ $au->pivot->id }}">
                {{-- id auction --}}
                <input type="hidden" name="id_auction" value="{{ $auction->id }}">
                {{-- id user --}}
                <input type="hidden" name="id_user" value="{{ $au->id  }}">

                <td class="align-middle text-center">
                  <button type="submit" class="submit-button bg-orange rounded ">Pilih</button>
                </td>
              </form>
              @else
                <td class="align-middle text-center">
                  <button type="button" class="submit-button bg-green rounded ">Pilih</button>
                </td>
              @endif
            </tr>
            @endforeach

          </tbody>
        </table>
          </x-modal>
          @endforeach
  </div>
  </x-app-layout>