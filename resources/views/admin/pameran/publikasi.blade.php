<x-app-layout title="Admin Publikasi Pameran">
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
      .modal-body {
        padding: 80px 0;
      }
      .modal-body p {
        margin: 0;
      }
      .submit-button {
        width: 100px;
        border-radius: 5px;
        padding: 1px ;
        font-weight: 600;
        font-size: 16px;
        border: 0;
        color: white;
      }  
    </style>
    @endslot
    <div class="container">
  
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Daftar Pameran : Publikasi</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Pameran</th>
              <th scope="col" class="text-center">Nama Pameran</th>
              <th scope="col" class="text-center">Tanggal Berlangsung</th>
              <th scope="col" class="text-center">Status</div>
            </tr>
          </thead>
          <tbody>   
            @foreach ($exhibitions as $exhibition)
            <tr>
              <td scope="row" class="align-middle text-center">{{ $exhibition->id }}</td>
              <td class="align-middle text-center">{{ $exhibition->name }}</td>
              <td class="align-middle text-center">{{ $exhibition->date }}</td>
              <td class="align-middle text-center">
                <i class="text-navy">Publikasi</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-publikasi-{{ $exhibition->id }}"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>

      @foreach ($exhibitions as $exhibition)
      <x-modal name="info-publikasi-{{ $exhibition->id }}">
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Detail Pameran</h1>
          <span class="underline-page-title text-center"></span>
        </div>
        <div class="row justify-content-center">
          <div class="col-8">
            <p>Nama Pameran : <b>{{ $exhibition->name }}</b></p>
            <p>Tanggal : <b>{{ $exhibition->date }}</b></p>
            <p>Waktu Mulai : <b>{{ $exhibition->start }}</b></p>
            <p>Waktu Berakhir : <b>{{ $exhibition->end }}</b></p>
            <p>Harga Tiket : <b>{{ $exhibition->price }}</b></p>
            <p>Deskripsi : <b>{{ $exhibition->description }}</b></p>
            <p>No.Handphone : <b>{{ $exhibition->artist->phone }}</b></p>
            <p>Email : <b>{{ $exhibition->artist->email }}</b></p>
            <p>Jumlah Karya : <b>{{ $exhibition->count }}</b></p>
            <a href="{{ route('admin.tiket-pameran') }}" class=" add-button btn-orange rounded"><i></i> Lihat Status Pembayaran</a>
      
          </div>
        </div>
      </x-modal>
      @endforeach

  </div>
  </x-app-layout>