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
        .submit-button {
          border-radius: 10px;
          color: white;
          font-size: 14px;
          font-weight: 700;
          padding: 10px 0;
          border: 0;
        }
        .error-message {
          color: red;
          font-size: 12px;
        }
      </style>
  @endslot

  <div class="container">

    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title">Profil Seniman</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <div class="row justify-content-center">
      <div class="col-10">
        
        <div class="row justify-content-between">
          
          <div class="col-md-5">
            
            <h5>Informasi Pribadi</h5>
            
            <form action="{{ route('users.update', $user) }}" method="post">
              @csrf
              @method('patch')
              <input type="hidden" name="code" value="1">
              <div class="mb-2">
                <label for="name" class="form-label label-small">Nama</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                @error('name')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-2">
                <label for="email" class="form-label label-small">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                @error('email')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-2">
                <label for="phone" class="form-label label-small">No. Handphone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}">
                @error('phone')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>

              <h5 class="mt-5">Alamat Rumah</h5>
    
              <div>
                <label for="street" class="form-label label-small">Alamat</label>
                <input type="text" name="street" class="form-control" id="street" value="{{ $user->address->street }}">
                @error('street')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="city" class="form-label label-small">Kota/Kabupaten</label>
                  <input type="text" name="city" class="form-control" id="city" value="{{ $user->address->city }}">
                  @error('city')
                      <span class="error-message">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="region" class="form-label label-small">Provinsi</label>
                  <input type="text" name="region" class="form-control" id="region" value="{{ $user->address->region }}">
                  @error('region')
                      <span class="error-message">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <label for="zipcode" class="form-label label-small">Kode Pos</label>
                  <input type="text" name="zipcode" class="form-control" id="zipcode" value="{{ $user->address->zipcode }}">
                  @error('zipcode')
                      <span class="error-message">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="d-grid mt-3">
                <button type="submit" class="submit-button bg-orange">SUBMIT</button>
              </div>
            </form>
          </div>
    
          <div class="col-md-5">

            <h5>Akun Bank</h5>
            <form action="{{ route('banks.update', $user->bank) }}" method="post">
              @csrf
              @method('patch')
              <div class="mb-2">
                <label for="name" class="form-label label-small">Nama Bank</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->bank->name }}">
                @error('name')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-2">
                <label for="number" class="form-label label-small">No. Rekening</label>
                <input type="text" name="number" class="form-control" id="number" value="{{ $user->bank->number }}">
                @error('number')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-2">
                <label for="owner" class="form-label label-small">Nama Pemilik Rekening</label>
                <input type="text" name="owner" class="form-control" id="owner" value="{{ $user->bank->owner }}">
                @error('owner')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
              <div class="d-grid mt-3 mb-5">
                <button type="submit" class="submit-button bg-orange">Ubah Akun Bank</button>
              </div>
            </form>
  
            <h5>Ubah Kata Sandi</h5>
            
            <form action="{{ route('users.update', $user) }}" method="post">
              @csrf
              @method('patch')
              <input type="hidden" name="code" value="2">
              <div class="mb-2">
                <label for="password" class="form-label label-small">Kata Sandi Baru</label>
                <input type="password" name="password" class="form-control" id="password">
              </div>
              <div class="mb-2">
                <label for="repassword" class="form-label label-small">Ulangi Kata Sandi Baru</label>
                <input type="password" name="repassword" class="form-control" id="repassword">
                @error('repassword')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
              <div class="d-grid mt-3 mb-5">
                <button type="submit" class="submit-button bg-orange">Ubah Kata Sandi</button>
              </div>
            </form>
  
          </div>
    
      </div>

    </div>

  </div>
  
</x-app-layout>