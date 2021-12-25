<x-app-layout title="Admin Tersedia Lelang">
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
      .modal-body {
        padding: 80px 0;
      }
      .modal-body p {
        margin: 0;
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
    </style>
@endslot
    <div class="container">
  
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Daftar Karya : Tersedia</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Lelang</th>
              <th scope="col" class="text-center">Nama Karya</th>
              <th scope="col" class="text-center">Seniman</th>
              <th scope="col" class="text-center">Aksi</th>
              <th scope="col" class="text-center">Status</div>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row" class="align-middle text-center">{{ $auction->id }}</td>
              <td class="align-middle text-center">{{ $auction->name }}</td>
              <td class="align-middle text-center">{{ $auction->seniman }}</td>
              <td class="align-middle text-center">
              <button type="submit" class="submit-button bg-orange rounded ">Konfirmasi</button>
              <td class="align-middle text-center">
                <i class="text-warning">Sudah Bayar</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-sedia"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
            <tr>
            <td scope="row" class="align-middle text-center">{{ $auction->id }}</td>
              <td class="align-middle text-center">{{ $auction->name }}</td>
              <td class="align-middle text-center">{{ $auction->seniman }}</td>
              <td class="align-middle text-center">
              
              <td class="align-middle text-center">
                <i class="text-warning">Terkonfirmasi</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-sedia"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
            <tr>
            <td scope="row" class="align-middle text-center">{{ $auction->id }}</td>
              <td class="align-middle text-center">{{ $auction->name }}</td>
              <td class="align-middle text-center">{{ $auction->seniman }}</td>
              <td class="align-middle text-center">
              
              <td class="align-middle text-center">
                <i class="text-warning">Sedang Berlangsung</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-sedia"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
            <tr>
            <td scope="row" class="align-middle text-center">{{ $auction->id }}</td>
              <td class="align-middle text-center">{{ $auction->name }}</td>
              <td class="align-middle text-center">{{ $auction->seniman }}</td>
              <td class="align-middle text-center">
              
              <td class="align-middle text-center">
                <i class="text-warning">Belum Dibayar</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-sedia"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
          </tbody>
      </table>
      <x-modal name="info-sedia">
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Informasi Pembayaran Lelang</h1>
          <span class="underline-page-title text-center"></span>
        </div>
        <div class="row justify-content-center">
          <div class="col-8">
            <p>Kategori : <b>{{ $artwork->category->name }}</b></p>
            <p>ID Karya : <b>{{ $artwork->id }}</b></p>
            <p>Nama Karya : <b>{{ $artwork->name }}</b></p>
            <p>Media : <b>{{ $artwork->media }}</b></p>
            <p>Ukuran : <b>{{ $artwork->size }}</b></p>
            <p>Tahun Dibuat : <b>{{ $artwork->year }}</b></p>
            <p>Deskripsi : {{ $artwork->description }}</p>
          </div>
        </div>
      </x-modal>
  </div>
  </x-app-layout>