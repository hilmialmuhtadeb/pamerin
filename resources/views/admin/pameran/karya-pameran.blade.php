<x-app-layout title="Karya Dalam Pameran">

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
        <h1 class="text-center page-title">Karya Dalam Pameran</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      
        <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Karya</th>
              <th scope="col" class="text-center">Nama Karya</th>
              <th scope="col" class="text-center">Karya</th>
              <th scope="col" class="text-center">Informasi</th>
            </tr>
          </thead>
  
          <tbody>   
            <tr>
              <td scope="row" class="align-middle text-center">#</td>
              <td class="align-middle text-center">#</td>
              <td class="py-2 text-center"><img src="{{asset('#')}}" height="100px"></td>
              <td class="align-middle text-center">
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-modal"><i class="fas fa-info"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      
    </div>
  
    {{-- modal --}}
      <x-modal name="info-modal">
  
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Informasi Karya Seni</h1>
          <span class="underline-page-title text-center"></span>
        </div>
  
        <div class="row justify-content-center">
          <div class="col-8">
  
            <p>Kategori : <b>#</b></p>
            <p>ID Karya : <b>#</b></p>
            <p>Nama Karya : <b>#</b></p>
            <p>Media : <b>#</b></p>
            <p>Ukuran : <b>#</b></p>
            <p>Tahun Dibuat : <b>#</b></p>
            <p>Deskripsi : #</></p>
            
          </div>
        </div>
        
      </x-modal>
  
  </x-app-layout>