<x-app-layout title="Daftar Karya Seni">

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
      <h1 class="text-center page-title">Daftar Karya Seni</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <div class="ms-auto text-end">
      <a href="{{ route('artworks.create') }}" class="add-button btn-orange rounded"><i class="fas fa-plus"></i> Karya</a>
    </div>

    <p class="text-danger my-4">Silakan tambah karya seni untuk mengajukan pameran dan membuat lelang karya seni!</p>
    
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
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>

        <tbody>   
          @foreach ($artworks as $artwork)
          <tr>
            <td scope="row" class="align-middle text-center">M-{{ $artwork->id }}</td>
            <td class="align-middle text-center">{{ $artwork->name }}</td>
            <td class="py-2 text-center"><img src="{{ asset($artwork->thumbnail) }}" height="100px"></td>
            <td class="align-middle text-center">

              <button type="button" class="btn trash-button mx-2" data-bs-toggle="modal" data-bs-target="#trash-modal-{{ $artwork->id }}"><i class="fas fa-trash-alt"></i></button>

              <button type="button" class="btn sell-button mx-2{{ $artwork->price === null ? '' : ' disabled' }}" data-bs-toggle="modal" data-bs-target="#sell-modal-{{ $artwork->id }}"><i class="fas fa-dollar-sign"></i></button>

              <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-modal-{{ $artwork->id }}"><i class="fas fa-info"></i></button>
              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-4">
        {{ $artworks->links() }}
      </div>
    @endif
    
  </div>

  {{-- modal --}}

  @foreach ($artworks as $artwork)    
    <x-modal name="trash-modal-{{ $artwork->id }}">
      <p class="text-center m-title">PERHATIAN!</p>
      <p class="text-center m-description">Apakah Anda yakin akan menghapus karya seni tersebut dari daftar?</p>

      <div class="d-flex justify-content-center">
        <form action="{{ route('artworks.destroy', $artwork) }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="confirm-button">Ya</button>
        </form>
        <button type="button" class="decline-button bg-orange" data-bs-dismiss="modal">Tidak</button>
      </div>
    </x-modal>


    <x-modal name="sell-modal-{{ $artwork->id }}">
      <div class="row justify-content-center">
        <div class="col-8">
          
          <form action="{{ route('artworks.sell', $artwork) }}" method="post">
            @csrf
            @method('patch')

            <p>Silahkan masukkan harga karya seni tersebut</p>
            <div class="mb-2">
              <label for="price" class="form-label label-small mb-2">Harga Jual</label>
              <input type="number" name="price" class="form-control" id="price">
              @error('price')
                    <span class="error-message">{{ $message }}</span>
              @enderror
            </div>
            <p class="my-4">Apakah Anda yakin akan menjual karya seni tersebut?</p>
            <div class="d-flex justify-content-center">
              <button type="submit" class="confirm-button">Ya</button>
              <button type="button" class="decline-button bg-orange" data-bs-dismiss="modal">Tidak</button>
            </div>
            
          </form>

        </div>
      </div>
    </x-modal>

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