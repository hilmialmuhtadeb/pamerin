<x-app-layout title="Detail Pengiriman">

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

  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center mb-5">
      <h1 class="text-center page-title">Detail Pengiriman Karya</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <h5>Alamat Pengiriman</h5>
    <form action="" method="post">

      <div class="row">

        <div class="col-md-6">

          <div class="form-check">
            <input class="form-check-input" type="radio" name="address-type" id="default" value="default">
            <label class="form-check-label" for="default">Alamat Saya</label>
          </div>

          <div class="form-box">
            <div>
              <label for="alamat-default" class="form-label label-small">Alamat</label>
              <input type="text" class="form-control" id="alamat-default">
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="kota-default" class="form-label label-small">Kota/Kabupaten</label>
                <input type="text" class="form-control" id="kota-default">
              </div>
              <div class="col-md-6">
                <label for="provinsi-default" class="form-label label-small">Provinsi</label>
                <input type="text" class="form-control" id="provinsi-default">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="zip-default" class="form-label label-small">Kode Pos</label>
                <input type="text" class="form-control" id="zip-default">
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-6">

          <div class="form-check">
            <input class="form-check-input" type="radio" name="address-type" id="custom" value="custom">
            <label class="form-check-label" for="custom">Tambah Alamat</label>
          </div>

          <div class="form-box">
            <div>
              <label for="alamat-custom" class="form-label label-small">Alamat</label>
              <input type="text" class="form-control" id="alamat-custom">
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="kota-custom" class="form-label label-small">Kota/Kabupaten</label>
                <input type="text" class="form-control" id="kota-custom">
              </div>
              <div class="col-md-6">
                <label for="provinsi-custom" class="form-label label-small">Provinsi</label>
                <input type="text" class="form-control" id="provinsi-custom">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="zip-custom" class="form-label label-small">Kode Pos</label>
                <input type="text" class="form-control" id="zip-custom">
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="row my-5">
        <div class="col-md-6">
          <h5>Pilihan Ongkos Pengiriman (Karya dikirim dari Kalimantan)</h5>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="jawa" id="jawa">
            <label class="form-check-label" for="jawa">
              Area Jawa Bali | Rp50.000
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="jawa" id="jawa">
            <label class="form-check-label" for="jawa">
              Area Sulawesi | Rp40.000
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="jawa" id="jawa">
            <label class="form-check-label" for="jawa">
              Area Kalimantan | Rp20.000
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="jawa" id="jawa">
            <label class="form-check-label" for="jawa">
              Area Papua | Rp80.000
            </label>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end mb-5">
        <a href="{{ route('carts.show', Auth::user()->cart) }}" class="btn-cancel me-3">Batal</a>
        <button type="submit" class="btn-orange">Simpan</button>
      </div>
      
    </form>
    
  </div>
  
</x-app-layout>