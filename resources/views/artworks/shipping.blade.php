<x-app-layout title="Tambah Karya Seni">

  @slot('style')
      <style>
        .label-small {
          font-size: 14px;
          color: #828282;
          margin-bottom: 0;
        }
        .form-control, .form-select {
          font-size: 14px;
          box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.185);
        }
        .submit-button {
          font-size: 14px;
          font-weight: 700;
          width: 250px;
          padding: 10px;
          border: 0;
          color: white;
        }
        .button-wrapper {
          text-align: right;
        }
        .step {
          font-size: 16px
        }
        .step-ext {
          font-size: 14px;
        }

      </style>
  @endslot

  <div class="container">

    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title">Tambah Karya Seni</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <p class="step">Langkah 2 : <b>Informasi Ongkos Kirim (Karya dikirim dari {{ $artwork->artist->region }})</b></p>
    <p class="step-ext">Data ini akan digunakan saat Anda menjual dan melelang karya seni Anda. </p>

    
    <form action="{{ route('artworks.shipping', $artwork) }}" method="post">
      @csrf

      <div class="row ms-3">
        <div class="col-md-5">
      
          <div class="mb-2">
            <label for="jawa" class="form-label label-small">Area Jawa Bali</label>
            <input type="number" name="jawa" class="form-control" id="jawa">
            @error('jawa')
                  <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-2">
            <label for="sumatera" class="form-label label-small">Area Sumatera</label>
            <input type="number" name="sumatera" class="form-control" id="sumatera">
            @error('sumatera')
                  <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-2">
            <label for="kalimantan" class="form-label label-small">Area Kalimantan</label>
            <input type="number" name="kalimantan" class="form-control" id="kalimantan">
            @error('kalimantan')
                  <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-2">
            <label for="sulawesi" class="form-label label-small">Area Sulawesi</label>
            <input type="number" name="sulawesi" class="form-control" id="sulawesi">
            @error('sulawesi')
                  <span class="error-message">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-2">
            <label for="papua" class="form-label label-small">Area Papua</label>
            <input type="number" name="papua" class="form-control" id="papua">
            @error('papua')
                  <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

        </div>
      </div>

      <div class="button-wrapper">
        <button type="submit" class="submit-button bg-orange rounded mb-5">SUBMIT</button>
      </div>

    </form>
        

  </div>
  
</x-app-layout>