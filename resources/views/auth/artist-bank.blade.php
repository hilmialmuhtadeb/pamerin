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
          height: 250px;
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
        .left-side h6 {
          font-size: 14px;
          border-bottom: 1px solid #FEFEFE;
        }
        span.round-number {
          display: inline-block;
          width: 28px;
          height: 28px;
          text-align: center;
          line-height: 28px;
          border-radius: 50%;
        }
        .button-check {
          padding-bottom: 135px;
        }
      </style>
  @endslot

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8">

        <div class="row wrapper">

          <div class="col-4 left-side">

            <div class="row">
              <h6 class="p-3 text-white"><span class="mx-2 round-number bg-orange">1</span> Informasi Pribadi</h6>
              <h6 class="p-3 text-white"><span class="mx-2 round-number bg-orange">2</span> Akun Bank</h6>
            </div>

          </div>

          <div class="col-8 right-side bg-white py-3">

            <h6 class="form-title text-center">Akun Bank</h6>
            <p class="form-text text-center">Silakan masukkan akun bank Anda untuk proses pembayaran!</p>

            <div class="form-wrapper">
              <form action="{{ route('banks.store') }}" method="post">
                @csrf
                <div class="mb-1">
                  <label for="name" class="form-label text-secondary">Nama Bank</label>
                  <input type="text" name="name" value="{{ old("name") }}" class="form-control" id="name">
                  @error('name')
                      <span class="error-message">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-1">
                  <label for="number" class="form-label text-secondary">No. Rekening</label>
                  <input type="text" name="number" value="{{ old("number") }}" class="form-control" id="number">
                  @error('number')
                      <span class="error-message">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-1">
                  <label for="owner" class="form-label text-secondary">Nama Pemilik Rekening</label>
                  <input type="text" name="owner" value="{{ old("owner") }}" class="form-control" id="owner">
                  @error('owner')
                      <span class="error-message">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mt-4 d-flex button-check justify-content-end">
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