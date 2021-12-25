<x-app-layout title="Karya Seni Dijual">

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
      <h1 class="text-center page-title">Daftar Karya Seni : Dijual</h1>
      <span class="underline-page-title text-center"></span>
    </div>
    
    @if ($artworks->count() === 0)
      <div class="alert alert-warning text-center" role="alert">
        Anda belum menambahkan karya seni apapun, silahkan tambah karya seni <a href="{{ route('artworks.create') }}">disini</a>
      </div>
    @else
      <table class="table-custom table table-borderless table-striped">
        <thead>
          <tr>
            <th scope="col" class="text-center">ID Karya</th>
            <th scope="col" class="text-center">Nama Karya</th>
            <th scope="col" class="text-center">Karya</th>
            <th scope="col" class="text-center">Status</th>
          </tr>
        </thead>

        <tbody>   
          @foreach ($artworks as $artwork)
          <tr>
            <td scope="row" class="align-middle text-center">M-{{ $artwork->id }}</td>
            <td class="align-middle text-center">{{ $artwork->name }}</td>
            <td class="py-2 text-center"><img src="{{ asset($artwork->thumbnail) }}" height="100px"></td>
            <td class="align-middle text-center">
              <i class="text-orange">Dijual</i>
              <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-modal-{{ $artwork->id }}"><i class="fas fa-info"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
    
  </div>

  {{-- modal --}}
  @foreach ($artworks as $artwork)      
    <x-modal name="info-modal-{{ $artwork->id }}">

      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Informasi Karya Seni</h1>
        <span class="underline-page-title text-center"></span>
      </div>

      <div class="row justify-content-center">
        <div class="col-8">

          <p>Kategori : <b>{{ $artwork->category->name }}</b></p>
          <p>ID Karya : <b>M-{{ $artwork->id }}</b></p>
          <p>Nama Karya : <b>{{ $artwork->name }}</b></p>
          <p>Media : <b>{{ $artwork->media }}</b></p>
          <p>Ukuran : <b>{{ $artwork->size }}</b></p>
          <p>Tahun Dibuat : <b>{{ $artwork->year }}</b></p>
          <p>Deskripsi : {{ $artwork->description }}</></p>
          
        </div>
      </div>
      
    </x-modal>
  @endforeach

</x-app-layout>