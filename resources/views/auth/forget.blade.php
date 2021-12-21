<x-app-layout title="Daftar Akun">

    @slot('style')
        <style>
          body {
            background-image: linear-gradient(to left, #FF7171, #F6AE2D);
            background-size: cover;
          }
          html, body {
            height: 100%;
          }
          .wrapper {
            box-shadow: 0px 0px 20px 2px rgba(255, 255, 255, 0.253);
          }
          .navbar, footer {
            display: none;
          }
          .form-title {
            font-weight: 700;
            margin: 20px 0 10px;
          }
          .form-text {
            font-size: 10px
            font-weight: 400;
          }
          label, input[type=text], input[type=email], input[type=password] {
            font-size: .8em;
            font-weight: 600;
          }
          .form-wrapper {
            padding: 0 2em;
          }
          .submit-button {
            background-color: #F6AE2D;
            border: none;
            color: white;
            padding: 2px 6px;
          }
          .left-side {
            background-color: #FF7171;
            border-radius: 10px 0 0 10px;
          }
          .right-side {
            border-radius: 0 10px 10px 0;
          }
          .error-message {
            color: red;
            font-size: 12px;
          }
        </style>
    @endslot
  
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="row wrapper">
            <div class="col-4 left-side py-3">
              <h6 class="text-center py-3 text-white">Lupa Kata Sandi</h6>
            </div>
            <div class="col-8 right-side bg-white py-3">
              <h6 class="form-title text-center">Konfirmasi Akun</h6>
              <p class="form-text text-center">Silakan isi form dibawah ini untuk mengganti kata sandi Anda!</p>
              <div class="form-wrapper">
                <form action="{{ route('ganti') }}" method="post">
                  @csrf
                  <div class="mb-1">
                    <label for="name" class="form-label text-secondary">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old("name") }}" class="form-control" id="name">
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-1">
                    <label for="email" class="form-label text-secondary">Email</label>
                    <input type="email" name="email" value="{{ old("email") }}" class="form-control" id="email">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-1">
                    <label for="phone" class="form-label text-secondary">No. Handphone</label>
                    <input type="text" name="phone" value="{{ old("phone") }}" class="form-control" id="phone">
                    @error('phone')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="submit-button rounded-circle"><i class="fas fa-check"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>