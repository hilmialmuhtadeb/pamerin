<x-app-layout title="Admin Dikirim Karya">
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
        <h1 class="text-center page-title">Daftar Karya : Dikirim</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Karya</th>
              <th scope="col" class="text-center">Nama Karya</th>
              <th scope="col" class="text-center">Alamat Tujuan</th>
              <th scope="col" class="text-center">Status</div>
            </tr>
          </thead>
          <tbody>   
            @foreach ($artworks as $artwork)                
            <tr>
              <td scope="row" class="align-middle text-center">{{ $artwork->id }}</td>
              <td class="align-middle text-center">{{ $artwork->name }}</td>
              <td class="align-middle text-center"></td>
              <td class="align-middle text-center">
                <i class="text-primary">Dikirim</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-dikirim-{{ $artwork->id }}"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>

      @foreach ($artworks as $artwork)          
      <x-modal name="info-dikirim-{{ $artwork->id }}">
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Informasi Karya Seni</h1>
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
      @endforeach

  </div>
  </x-app-layout>