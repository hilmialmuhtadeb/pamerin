<x-app-layout title="Lelang Selesai">

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
            color: #888888;
            border-radius: 5px;
            transition: .3s;
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
        <h1 class="text-center page-title">Daftar Lelang : Selesai</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      
        <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Lelang</th>
              <th scope="col" class="text-center">Nama Lelang</th>
              <th scope="col" class="text-center">Lelang</th>
              <th scope="col" class="text-center">status</th>
            </tr>
          </thead>
  
          <tbody>   
            <tr>
              <td scope="row" class="align-middle text-center">#</td>
              <td class="align-middle text-center">#</td>
              <td class="py-2 text-center"><img src="{{asset('#')}}" height="100px"></td>
              <td class="align-middle text-center">
                <i class="text-warning">Belum Transfer</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-modal"><i class="fa fa-info-circle"></i></button>
              </td>
            
            </tr>
          </tbody>
        </table>
      
    </div>
  
    {{-- modal --}}
      <x-modal name="info-modal">
  
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Informasi Lelang</h1>
          <span class="underline-page-title text-center"></span>
        </div>
  
        <div class="row justify-content-center">
          <div class="col-8">
  
            <p>Status : <b class="text-warning" >#</b></p>
            <p>ID Pameran : <b>#</b></p>
            <p>Nama Pameran : <b>#</b></p>
            <p>Tiket Terjual : <b>#</b></p>
            <p>Besar Dana : <b>#</b></p>
            
          </div>
        </div>
        
      </x-modal>
  
  </x-app-layout>