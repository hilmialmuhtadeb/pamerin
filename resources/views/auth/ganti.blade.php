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
              <h6 class="form-title text-center">Password Baru</h6>
              <p class="form-text text-center">Silakan isi form dibawah ini untuk mengganti kata sandi Anda!</p>
              <div class="form-wrapper">
                    <h5>Ubah Kata Sandi</h5>
                    <form action="{{ route('lali') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="form-box">
                      <div class="mb-2">
                        <label for="password" class="form-label label-small">Kata Sandi Baru</label>
                        <input type="password" name="password" class="form-control" id="password">
                      </div>
                      <div class="mb-2">
                        <label for="repassword" class="form-label label-small">Ulangi Kata Sandi Baru</label>
                        <input type="password_confirm" name="repassword" class="form-control" id="repassword">
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="detail-button btn rounded-3">Ubah Kata Sandi</button>
                    </div>
                    </form>
                      </div>
                    </div>
                  </div>

                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>