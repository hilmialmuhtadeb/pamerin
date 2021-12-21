<x-app-layout title="Edit Profile">

  @slot('style')
      <style>
        h5 {
          font-size: 16px;
          font-weight: 500;
        }
        .label-small {
          font-size: 12px;
          color: #828282;
          margin-bottom: 0;
        }
        .form-control {
          font-size: 12px;
          box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.185);
        }
        .detail-button {
          background-color: #F6AE2D;
          color: white;
          font-size: 14px;
          font-weight: 700;
          transition: .2s;
        }
        .detail-button:hover {
          background-color: #cf8d11;
          color: white;
        }
      </style>
  @endslot

  <div class="container">
    <div class="d-flex justify-content-center flex-column align-items-center">
      <h1 class="text-center page-title">Profil</h1>
      <span class="underline-page-title text-center"></span>
    </div>
    <div class="row justify-content-center">
      <div class="col-10">
    
          <div class="row justify-content-center mt-5">
            <div class="col-md-4 me-5">
              
              <h5>Informasi Pribadi</h5>
              <form action="{{ route('users.update', Auth::user()->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
              <div class="mb-2">
                <label for="name" class="form-label label-small">Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name">
              </div>
              <div class="mb-2">
                <label for="email" class="form-label label-small">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email">
              </div>
              <div class="mb-2">
                <label for="phone" class="form-label label-small">No. Handphone</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" id="phone">
              </div>

              <h5 class="my-4">Alamat Rumah</h5>
    
              <div>
                <label for="street" class="form-label label-small">Alamat</label>
                <input type="text" name="street" value="{{ $address->street ? $address->street : '' }}"  class="form-control" id="street">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="kota-custom" class="form-label label-small">Kota/Kabupaten</label>
                  <input type="text" name="city" value="{{ $address->city ? $address->city : '' }}" class="form-control" id="kota-custom">
                </div>
                <div class="col-md-6">
                  <label for="provinsi-custom" class="form-label label-small">Provinsi</label>
                  <input type="text" name="region" value="{{ $address->region ? $address->region : '' }}" class="form-control" id="provinsi-custom">
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <label for="zip-custom" class="form-label label-small">Kode Pos</label>
                  <input type="text" name="zipcode" value="{{ $address->zipcode ? $address->zipcode : '' }}" class="form-control" id="zip-custom">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                  <input type="hidden" name="code" value="1">
              <div class="d-grid">
                <button type="submit" class="detail-button btn rounded-3 mb-3">Konfirmasi</button>
              </div>
            </form>
                </div>
              </div>
            </div>


            <div class="col-md-4">
    
              <h5>Ubah Kata Sandi</h5>
              <form action="{{ route('users.update',  Auth::user()->id) }}" method="POST">
              @csrf
              {{ method_field('PATCH') }}
              <div class="form-box">
                <div class="mb-2">
                  <label for="password" class="form-label label-small">Kata Sandi Baru</label>
                  <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-2">
                  <label for="repassword" class="form-label label-small">Ulangi Kata Sandi Baru</label>
                  <input type="password" name="repassword" class="form-control" id="repassword">
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12">
              <input type="hidden" name="code" value="2">
              <div class="d-grid">
                <button type="submit" class="detail-button btn rounded-3">Ubah Kata Sandi</button>
              </div>
              </form>
                </div>
              </div>
            </div>
      </div>
            
      </div>
    </div>
  </div>
  
</x-app-layout>