<x-app-layout title="Admin Pengguna">

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
          .edit-button {
            background-color: #27AE60;
            color: white
          }
          .edit-button:hover {
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
            margin-bottom: 40
          }
          .form-control, .form-select {
            height: 36px;
            width: 402px;
            font-size: 14px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.185);
          }
        </style>
    @endslot
  
    <div class="container">
  
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Pengguna Aplikasi</h1>
        <span class="underline-page-title text-center"></span>
      </div>
  
      <div class="ms-auto text-end">
        <a data-bs-toggle="modal" data-bs-target="#tambah-pengunjung" class="add-button btn-danger rounded"><i class="fas fa-plus"></i> Pengunjung</a>
        <a data-bs-toggle="modal" data-bs-target="#tambah-seniman" class="add-button btn-primary rounded"><i class="fas fa-plus"></i> Seniman</a>
        <a data-bs-toggle="modal" data-bs-target="#tambah-admin" class="add-button btn-orange rounded"><i class="fas fa-plus"></i> Admin</a>
      </div>
      <p class="text-danger my-4"></p>

        <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">Peran</th>
              <th scope="col" class="text-center">Nama</th>
              <th scope="col" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row" class="align-middle text-warning text-center">Admin</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">
                <button type="button" class="btn trash-button mx-2" data-bs-toggle="modal" data-bs-target="#trash-modal"><i class="fas fa-trash-alt"></i></button>
                <button type="button" class="btn edit-button mx-2 " data-bs-toggle="modal" data-bs-target="#info-admin"><i class="fas fa fa-edit "></i></button>
              </td>
            </tr>
            <tr>
              <td scope="row" class="align-middle text-danger text-center">Seniman</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">
                <button type="button" class="btn trash-button mx-2" data-bs-toggle="modal" data-bs-target="#trash-modal"><i class="fas fa-trash-alt"></i></button>
                <button type="button" class="btn edit-button mx-2 " data-bs-toggle="modal" data-bs-target="#info-admin"><i class="fas fa fa-edit "></i></button>
              </td>
            </tr>
            <tr>
              <td scope="row" class="align-middle text-primary text-center">Pengunjung</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">
                <button type="button" class="btn trash-button mx-2" data-bs-toggle="modal" data-bs-target="#trash-modal"><i class="fas fa-trash-alt"></i></button>
                <button type="button" class="btn edit-button mx-2 " data-bs-toggle="modal" data-bs-target="#info-admin"><i class="fas fa fa-edit "></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      
    
    </div>    
    
  {{-- modal --}}

  <x-modal name="tambah-seniman">
    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title">Tambah Seniman</h1>
      <span class="underline-page-title text-center"></span>
      <div class="row justify-content-center">
        <div class="col-8">
        
          <form action="#" method="post">
          @csrf
          @method('patch')
          <div class="mb-2">
            <label for="price" class="form-label">Nama</label>
            <input type="number" name="nama" class="form-control" id="price">
            @error('price')
                  <span class="error-message">#</span>
            @enderror
            <label for="price" class="form-label">Email</label>
            <input type="number" name="email" class="form-control" id="price">
            <label for="price" class="form-label">Password</label>
            <input type="number" name="password" class="form-control" id="price">
          </div>
          </form>
        </div>
      </div>
    </div>
  </x-modal>
  <x-modal name="tambah-pengunjung">
    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title">Tambah Pengunjung</h1>
      <span class="underline-page-title text-center"></span>
      <div class="row justify-content-center">
        <div class="col-8">
        
          <form action="#" method="post">
          @csrf
          @method('patch')
          <div class="mb-2">
            <label for="price" class="form-label">Nama</label>
            <input type="number" name="nama" class="form-control" id="price">
            @error('price')
                  <span class="error-message">#</span>
            @enderror
            <label for="price" class="form-label">Email</label>
            <input type="number" name="email" class="form-control" id="price">
            <label for="price" class="form-label">Password</label>
            <input type="number" name="password" class="form-control" id="price">
          </div>
          </form>
        </div>
      </div>
    </div>
  </x-modal>
  <x-modal name="info-admin">
    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
    <h1 class="text-center page-title">Informasi Admin</h1>
    <span class="underline-page-title text-center"></span>
    <div class="row justify-content-center">
      <div class="col-8">
        
        <form action="#" method="post">
          @csrf
          @method('patch')
          <div class="mb-2">
              <label for="price" class="form-label">Nama</label>
              <input type="number" name="nama" class="form-control" id="price">
              @error('nama')
                    <span class="error-message">#</span>
              @enderror
              <label for="price" class="form-label">Email</label>
              <input type="number" name="email" class="form-control" id="price">
              <label for="price" class="form-label">Password</label>
              <input type="number" name="password" class="form-control" id="price">
          </div>
          
        </form>

      </div>
    </div>
  </div>
  </x-modal>
  <x-modal name="trash-modal">
    <p class="text-center m-title">PERHATIAN!</p>
    <p class="text-center m-description">Apakah Anda yakin akan menghapus Pengguna tersebut dari daftar?</p>
    <div class="d-flex justify-content-center">
      <form action="#" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="confirm-button">Ya</button>
      </form>
      <button type="button" class="decline-button bg-orange" data-bs-dismiss="modal">Tidak</button>
    </div>
  </x-modal>

    <x-modal name="tambah-admin">
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Tambah Admin</h1>
        <span class="underline-page-title text-center"></span>
      <div class="row justify-content-center">
        <div class="col-8">
          
          <form action="#" method="post">
            @csrf
            @method('patch')
            <div class="mb-2">
              <label for="price" class="form-label">Nama</label>
              <input type="number" name="nama" class="form-control" id="price">
              @error('price')
                    <span class="error-message">#</span>
              @enderror
              <label for="price" class="form-label">Email</label>
              <input type="number" name="email" class="form-control" id="price">
              <label for="price" class="form-label">Password</label>
              <input type="number" name="password" class="form-control" id="price">
            </div>
          </form>
        </div>
      </div>
    </x-modal>
</div>
  </x-app-layout>