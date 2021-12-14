<x-app-layout title="Admin Tiket Pameran">
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
        <h1 class="text-center page-title">Pengunjung Pameran</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Tiket</th>
              <th scope="col" class="text-center">Nama</th>
              <th scope="col" class="text-center">Aksi</th>
              <th scope="col" class="text-center">Status</div>
            </tr>
          </thead>
          <tbody>   
            <tr>
              <td scope="row" class="align-middle text-center">#</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">
              <button type="submit" class="submit-button bg-orange rounded ">Transfer</button>
              <td class="align-middle text-center">
                <i class="text-warning">Belum Transfer</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-pembayaran"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
            <tr>
              <td scope="row" class="align-middle text-center">#</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">
              
              <td class="align-middle text-center">
                <i class="text-warning">Sudah Transfer</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="info-pembayaran"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
          </tbody>
      </table>
  
      <x-modal name="info-pembayaran">
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Informasi Pembayaran Karya Seni</h1>
          <span class="underline-page-title text-center"></span>
        </div>
        <div class="row justify-content-center">
          <div class="col-8">
            <p>Status : <b class="text-warning">#</b></p>
            <p>ID Pesanan : <b>#</b></p>
            <p>ID Karya : <b>#</b></p>
            <p>Nama Pemesan : <b>#</b></p>
            <p>Total Pembayaran : <b>#</b></p>
            <p>Alamat : <b>#</b></p>
            <p>Nama Bank : <b>#</b></p>
            <p>No.Rekening : <b>#</b></p>
            <p>Nama Pemilik Rekening : <b>#</b></p>
          </div>
        </div>
      </x-modal>
  </div>
  </x-app-layout>