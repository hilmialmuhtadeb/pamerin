<x-app-layout title="Daftar Lelang">

    @slot('style')
        <style>
          .add-button {
            text-decoration: none;
            padding: 5px 15px;
            font-size: 16px;
            font-weight: 700;
          }
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
          .trash-button, 
          .sell-button,
          .info-button {
            color: white;
            border-radius: 5px;
            transition: .3s;
          }
          .trash-button {
            background-color: #EB5757;
          }
          .trash-button:hover {
            background-color: #eb3b3b;
            color: white;
          }
          .sell-button {
            background-color: #27AE60;
          }
          .sell-button:hover {
            background-color: #277949;
            color: white;
          }
          .info-button {
            background-color: #B6B6B6;
          }
          .info-button:hover {
            background-color: #888888;
            color: white;
          }
          .m-title {
            font-weight: 700;
            font-size: 30px;
          }
          .m-description {
            font-size: 16px;
            padding: 20px 0;
          }
          .confirm-button,
          .decline-button {
            width: 100px;
            border-radius: 5px;
            padding: 5px;
            font-weight: 700;
            font-size: 16px;
          }
          .confirm-button {
            background-color: white;
            border: 1px solid black;
          }
          .decline-button {
            border: none;
            margin: 0 20px;
            color: white;
          }
          .modal-body {
            padding: 80px 0;
          }
          .modal-body p {
            margin: 0;
          }
          .label-small {
            font-size: 14px;
            color: #828282;
            margin-bottom: 0;
          }
          .form-control, .form-select {
            font-size: 14px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.185);
          }
        </style>
    @endslot
  
    <div class="container">
  
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Daftar Lelang</h1>
        <span class="underline-page-title text-center"></span>
      </div>
  
      <div class="ms-auto text-end">
        <a href="{{ route('artists.sale.create') }}" class="add-button btn-orange rounded"><i class="fas fa-plus"></i> Lelang</a>
      </div>
  
      <p class="text-danger my-4">Silakan tambah karya seni untuk mengajukan pameran dan membuat lelang karya seni!</p>
      @if ($auctions->count() === 0)
        <div class="alert alert-warning text-center" role="alert">
          Anda belum menambahkan karya seni apapun, silahkan tambah karya seni <a href="{{ route('artists.sale.create') }}">disini</a>
        </div>
      @else
        <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Lelang</th>
              <th scope="col" class="text-center">Nama Karya</th>
              <th scope="col" class="text-center">Karya</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
  
          <tbody>   
            @foreach ($auctions as $auction)
            <tr>
              <td scope="row" class="align-middle text-center">M-{{ $auction->id }}</td>
              <td class="align-middle text-center">{{ $auction->name }}</td>
              <td class="py-2 text-center"><img src="{{ asset($auction->thumbnail) }}" height="100px"></td>
              <td class="align-middle text-center">
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-modal-{{ $auction->id }}"><i class="fas fa-info"></i></button>
                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @endif
      
    </div>
  
    {{-- modal --}}
  
    @foreach ($auctions as $auction)
      <x-modal name="info-modal-{{ $auction->id }}">
  
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Informasi Karya Lelang</h1>
          <span class="underline-page-title text-center"></span>
        </div>
  
        <div class="row justify-content-center">
          <div class="col-8">
  
            <p>Nama Karya : <b>{{ $auction->name }}</b></p>
            <p>Tanggal : <b>{{ $auction->date }}</b></p>
            <p>Waktu Dimulai : <b>{{ $auction->start }}</b></p>
            <p>Waktu Berakir : <b>{{ $auction->end }}</b></p>
            <p>Deskripsi : {{ $auction->description }}</></p>
          </div>
        </div>
        
      </x-modal>
      @endforeach
  </x-app-layout>