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
        .form-container{
          width: 60%;
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
          padding:  5px;
          width: 406px;
          font-size: 14px;
          box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.185);
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        .submit-button {
          width: 100px;
          border-radius: 5px;
          padding: 5px;
          font-weight: 700;
          font-size: 16px;
          border: 0;
          color: white;
        }
        .button-wrapper {
          text-align: right;
        }
}
      </style>
  @endslot
  
  <div class="container">

    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title">Pengguna Aplikasi</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <div class="ms-auto text-end">
      <button data-bs-toggle="modal" data-bs-target="#tambah-admin" class="add-button border-0 btn-orange rounded"><i class="fas fa-plus"></i> Admin</button>
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
          @foreach ($users as $user)
            <tr>
              <td scope="row" class="align-middle text-center {{ $color[($user->type - 1)] }}">{{ $role[($user->type - 1)] }}</td>
              <td class="align-middle text-center">{{ $user->name }}</td>
              <td class="align-middle text-center">
                <button type="button" class="btn trash-button mx-2" data-bs-toggle="modal" data-bs-target="#trash-modal-{{ $user->id }}"><i class="fas fa-trash-alt"></i></button>
                <button type="button" class="btn edit-button mx-2 " data-bs-toggle="modal" data-bs-target="#{{ $modal[($user->type - 1)] }}-{{ $user->id }}"><i class="fas fa fa-edit "></i></button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    
  
  </div>    
    
  {{-- modal --}}
  @foreach ($admins as $admin)      
  <x-modal name="info-admin-{{ $admin->id }}">
    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
    <h1 class="text-center page-title">Informasi Admin</h1>
    <span class="underline-page-title text-center"></span>
    <div class="row justify-content-center">
        
        <form action="{{ route('users.update', $admin) }}" method="post">
          @csrf
          @method('patch')
          <div class="mb-2">
              <label for="name" class="form-label">Nama</label>
              <input type="name" name="name" class="form-control" id="name" value="{{ $admin->name }}">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="{{ $admin->email }}">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
          </div>
          <div class="button-wrapper">
            <button type="button" class="submit-button bg-grey rounded mb-5"  data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="submit-button bg-orange rounded mb-5">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  </x-modal>
  @endforeach

  @foreach ($artists as $artist)
  <x-modal name="edit-seniman-{{ $artist->id }}">
    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title">Informasi Seniman</h1>
      <span class="underline-page-title text-center"></span>
      <div class="row justify-content-center">
        
          <form action="#" method="post">
          @csrf
          @method('patch')
          <div class="mb-2">
            <label class="form-label">Nama</label>
            <input type="name" class="form-control" value="{{ $artist->name }}" disabled>
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ $artist->email }}" disabled>
            <label class="form-label">No.Handphone</label>
            <input type="number" class="form-control" value="{{ $artist->phone }}" disabled>
            <label class="form-label">Alamat</label>
            <input type="address" class="form-control" value="{{ $artist->address->street }}" disabled>
            <label class="form-label">Provinsi</label>
            <input type="prov" class="form-control" value="{{ $artist->address->region }}" disabled>
            <label class="form-label">Kota/Kabupaten</label>
            <input type="city" class="form-control" value="{{ $artist->address->city }}" disabled>
            <label class="form-label">Kode Pos</label>
            <input type="kodepos" class="form-control" value="{{ $artist->address->zipcode }}" disabled>
            <label class="form-label">Nama Bank</label>
            <input type="bank" class="form-control" value="{{ $artist->bank->name }}" disabled>
            <label class="form-label">Nomor Rekening</label>
            <input type="norek" class="form-control" value="{{ $artist->bank->number }}" disabled>
            <label class="form-label">Nama Pemilik Rekening</label>
            <input type="namarek" class="form-control" value="{{ $artist->bank->owner }}" disabled>
          </div>
          <div class="button-wrapper my-3">
            <button type="button" class="submit-button bg-grey rounded mb-5"  data-bs-dismiss="modal">Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </x-modal>
  @endforeach

  @foreach ($guests as $guest)
  <x-modal name="edit-pengunjung-{{ $guest->id }}">
    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title">Informasi Pengunjung</h1>
      <span class="underline-page-title text-center"></span>
      <div class="row justify-content-center">
        
          <form action="#" method="post">
            <label class="form-label">Nama</label>
            <input type="name" class="form-control" value="{{ $guest->name }}" disabled>
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ $guest->email }}" disabled>
            <label class="form-label">No.Handphone</label>
            <input type="number" class="form-control" value="{{ $guest->phone }}" disabled>
            <label class="form-label">Alamat</label>
            <input type="address" class="form-control" value="{{ $guest->address->street }}" disabled>
            <label class="form-label">Provinsi</label>
            <input type="prov" class="form-control" value="{{ $guest->address->region }}" disabled>
            <label class="form-label">Kota/Kabupaten</label>
            <input type="city" class="form-control" value="{{ $guest->address->city }}" disabled>
            <label class="form-label">Kode Pos</label>
            <input type="kodepos" class="form-control" value="{{ $guest->address->zipcode }}" disabled>
          <div class="button-wrapper my-3">
            <button type="button" class="submit-button bg-grey rounded mb-5"  data-bs-dismiss="modal">Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </x-modal>
  @endforeach

  @foreach ($users as $user)
  <x-modal name="trash-modal-{{ $user->id }}">
    <p class="text-center m-title">PERHATIAN!</p>
    <p class="text-center m-description">Apakah Anda yakin akan menghapus <b>{{ $user->name }}</b> dari daftar?</p>
    <div class="d-flex justify-content-center">
      <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="confirm-button">Ya</button>
      </form>
      <button type="button" class="decline-button bg-orange" data-bs-dismiss="modal">Tidak</button>
    </div>
  </x-modal>
  @endforeach

  

  <x-modal name="tambah-admin">
    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title">Tambah Admin</h1>
      <span class="underline-page-title text-center"></span>
    <div class="row justify-content-center">
        
        <form action="{{ route('users.store') }}" method="post">
          @csrf
          <div class="mb-2">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" id="name">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <input type="hidden" name="type" value="1">
          </div>

          <div class="button-wrapper">
            <button type="button" class="submit-button bg-grey rounded mb-5"  data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="submit-button bg-orange rounded mb-5">Tambah</button>
          </div>
        </form>

    </div>
  </x-modal>

</x-app-layout>