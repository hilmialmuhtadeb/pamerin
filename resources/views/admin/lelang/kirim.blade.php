<x-app-layout title="Admin Dikirim Lelang">
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
    </style>
@endslot
    <div class="container">
  
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Daftar Lelang : Dikirim</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Lelang</th>
              <th scope="col" class="text-center">Nama Karya</th>
              <th scope="col" class="text-center">Alamat Tujuan</th>
              <th scope="col" class="text-center">Status</div>
            </tr>
          </thead>
          <tbody>   
            <tr>
              <td scope="row" class="align-middle text-center">#</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">
                <i class="text-warning">Dikirim</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-dikirim"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
          </tbody>
      </table>
      <x-modal name="info-dikirim">
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Informasi Pengiriman Karya Seni</h1>
          <span class="underline-page-title text-center"></span>
        </div>
        <div class="row justify-content-center">
          <div class="col-8">
            <p>Status : <b class="text-warning">#</b></p>
            <p>ID Pesanan : <b>#</b></p>
            <p>ID Karya : <b>#</b></p>
            <p>Nama Pemesanan : <b>#</b></p>
            <p>Total Pembayaran : <b>#</b></p>
            <p>Alamat : <b>#</b></p>
          </div>
        </div>
      </x-modal>
  </div>
  </x-app-layout>