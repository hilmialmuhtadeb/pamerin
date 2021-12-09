<x-app-layout title="Seniman Karya Pesanan Diterima">
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
        color: white;
        border-radius: 5px;
        transition: .3s;
        background-color: #B6B6B6;
      }
      .info-button:hover {
        background-color: #888888;
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
        <h1 class="text-center page-title">Daftar Karya Seni : Pesanan Masuk</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Pesanan</th>
              <th scope="col" class="text-center">ID Karya</th>
              <th scope="col" class="text-center">Nama Karya</th>
              <th scope="col" class="text-center">Status</div>
            </tr>
          </thead>
      </table>
  </div>
  </x-app-layout>