<x-app-layout title="{{ $exhibition->name }}">

  @slot('style')
      <style>
        .breadcrumb-item>a{
          text-decoration: none;
          color: #F6AE2D;
        }
        .img-exhibition {
          min-width: 100%;
        }
        .card-info {
          background-color: rgba(255, 255, 255, 0.6);
          border-radius: 5px;
          box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.267);
        }
        .exhibition-title {
          font-size: 25px;
          font-weight: 800;
        }
        .exhibition-info {
          margin: 0;
          font-size: 14px;
        }
        .exhibition-sold {
          font-size: 12px;
          margin: 10px 0;
        }
        .title-2 {
          font-size: 22px;
          font-weight: 700;
        }
        .exhibition-description {
          font-size: 12px;
        }
        .exhibition-button {
          background-color: #F6AE2D;
          color: white;
          font-size: 14px;
          font-weight: 700;
          transition: .2s;
        }
        .exhibition-button:hover {
          background-color: #cf8d11;
          color: white;
        }
        .exhibition-user {
          color: #828282;
          font-size: 14px;
        }
      </style>
  @endslot

  <div class="container">

    <div class="row mb-4">
      @include('components._breadcrumbs')
    </div>

    <div class="row justify-content-center mb-3">

      <div class="col-md-5">
        <img src="{{asset($exhibition->thumbnail) }}" class="img-detail img-fluid rounded">
      </div>

      <div class="col-md-5">
        <div class="card-info p-3">

          <h1 class="exhibition-title">{{ $exhibition->name }}</h1>
          <p class="exhibition-info">
            <i class="text-grey far fa-calendar-alt"></i> <span class="ms-2 text-orange">{{ date_format(date_create($exhibition->date), "l, d F Y") }}</span>
          </p>
          <p class="exhibition-info">
            <i class="text-grey far fa-clock"></i> <span class="ms-2 text-orange">{{ $exhibition->start }} - {{ $exhibition->end }}</span>
          </p>
          <p class="exhibition-sold"><b>Terjual</b> 20 Tiket</p>
          <p class="title-2 text-red">Rp {{ number_format($exhibition->price) }}</p>
          <p class="exhibition-description">{{ $exhibition->description }}</p>
          <div class="d-grid">
          <form action="{{ route('exhibitions.detail') }}" method="post">
              @csrf
              <input type="hidden" name="exhibition_id" value="{{ $exhibition->id }}">
              <div class="d-grid">
                <button type="submit" class="exhibition-button btn rounded-3">Pesan Sekarang</button>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>

    
    <div class="row justify-content-md-center">
      <div class="col">
        <h2 class="title-2">Tentang Seniman</h2>
        <p class="exhibition-user">
          <i class="fas fa-user"></i> {{ $exhibition->artist->name }}, {{ $exhibition->artist->region }}
        </p>
      </div>
    </div>
    {{-- <div class=malasngoding-slider> --}}
      {{-- <div class=isi-slider > --}}
       {{-- <div class="card col-md-3 mt-2 mb-3" > --}}
      {{-- <img class="card-img-top" src="{{asset($exhibition->thumbnail) }}" alt="Card image cap"> --}}
        {{-- </div> --}}
      {{-- </div> --}}
      {{-- </div> --}}
    </div>
  </div>
  </div>
  
</x-app-layout>