<x-app-layout title="Konfirmasi Pembayaran">

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
        .form-box {
          margin-left: 25px;
        }
        .btn-orange {
          border: none;
          color: white;
          padding: 8px 20px;
          font-weight: 700;
          font-size: 13px;
          border-radius: 10px;
        }
        .btn-cancel {
          background-color: #FEFEFE;
          color: #B6B6B6;
          text-decoration: none;
          padding: 8px 20px;
          transition: .2s;
          font-weight: 700;
          font-size: 13px;
          border-radius: 10px;
          border: 1px solid #B6B6B6;
        }
        .btn-cancel:hover {
          background-color: #d4d4d4;
        }
      </style>
  @endslot

  <div class="container w-25">
    <div class="d-flex flex-column align-items-center justify-content-center mb-5">
      <h1 class="text-center page-title">Kirim Bukti Pembayaran</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <h5>Total Pembayaran : <b>Rp. </b></h5>

    <span>Metode Pembayaran :</span>
    <form action="" method="POST" >
      @csrf 
    <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" value="BRI" id="BRI">
            <label class="form-check-label" for="BRI">
            <b>BANK BRI</b> 1029382131923<br>(DEODIA LORENSA)
            </label></div>
            <div class="form-check mb-5">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="Dana" id="Dana">
            <label class="form-check-label" for="Dana">
            <b>OVO & DANA</b> 085612345678<br>(DEODIA LORENSA)
            </label></div>
            <p>Unggah Bukti Pembayaran (.jpg / .jpeg)</p>
            <div class="mb-3">
            <label class="form-label label-small mb-2">Unggah Gambar Karya Seni (.jpg/.jpeg/.png)</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            @error('thumbnail')
                  <span class="error-message">{{ $message }}</span>
            @enderror
            <!-- <div class="mb-3 mt-5">
               <a href="{{ route('tickets.show') }}" class="rounded btn-orange btn-address" >Simpan</a>
            </div> -->

            <div class="mb-3">
              <label class="form-label label-small mb-2">Unggah Gambar Karya Seni (.jpg/.jpeg/.png)</label>
              <input type="text" name="thumbnail" id="thumbnail" class="form-control" value="{{$exhibition->user->id}}">
            </div>

            <button class="rounded btn-orange btn-address" type="submit">Simpan</button>
    </div>
    </form> 
  </div>
  
</x-app-layout>