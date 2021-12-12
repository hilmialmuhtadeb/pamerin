<x-app-layout title="Admin Detail Publikasi Pameran">

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
          .step {
            font-size: 16px;
          }
  
        </style>
    @endslot
  
    <div class="container">
  
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Detail Pameran</h1>
        <span class="underline-page-title text-center"></span>
      </div>
        <div class="ms-3 row d-flex justify-content-center ">
  
          <div class="col-md-5">
  
            <div class="mb-2">
              <label for="name" class="form-label label-small">Nama Pameran</label>
              <input type="text" name="name" class="form-control" id="name">
              @error('name')
                    <span class="error-message">{{ $message }}</span>
              @enderror
            </div>
            <label for="number" class="form-label label-small">Tanggal</label>
            <input type="number" name="number" class="form-control" id="number">
            <label for="prov" class="form-label label-small">Waktu Mulai</label>
            <input type="prov" name="prov" class="form-control" id="prov">
            <label for="city" class="form-label label-small">Waktu Berakhir</label>
            <input type="city" name="city" class="form-control" id="city">
            <label for="kodepos" class="form-label label-small">Harga Tiket</label>
            <input type="kodepos" name="kodepos" class="form-control" id="kodepos">
            <div class="mb-2">
                <label for="description" class="form-label label-small">Deskripsi (maks 100 kata)</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                @error('description')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
              <label class="form-label label-small">Jumlah Pengunjung : <b>#</b></label>

              <a href="" type="button" class="btn button bg-orange rounded mb-3 ">Lihat Status Pembayaran</a>

          </div>
  
        </div>
  
      </form>
  
    </div>
    
  </x-app-layout>