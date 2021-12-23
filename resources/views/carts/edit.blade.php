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
    <form action="/carts/edit/{{$cart->id}}/{{$artwork->id}}" method="post">
          @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-check">
            @if ($details->street == $user->address->street)
              <input class="form-check-input" type="radio" name="address_type" id="default" value="default" checked>
            @else
              <input class="form-check-input" type="radio" name="address_type" id="default" value="default">
            @endif
            
            <label class="form-check-label" for="default">Alamat Saya</label>
          </div>
          <div class="form-box">
            <div>
              <label for="alamat-default" class="form-label label-small">Alamat</label>
              <input type="text" class="form-control" id="alamat-default" name="alamat_default" value="{{$user->address->street}}" readonly>
                @error('alamat_default')
                  {{ $message }}
                @enderror
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="kota-default" class="form-label label-small">Kota/Kabupaten</label>
                <input type="text" class="form-control" id="kota-default" name="kota_default" value="{{$user->address->city}}" readonly>
                @error('kota_default')
                  {{ $message }}
                @enderror
              </div>
              <div class="col-md-6">
                <label for="provinsi-default" class="form-label label-small">Provinsi</label>
                <input type="text" class="form-control" name="provinsi_default" id="provinsi-default" value="{{$user->address->region}}" readonly>
                @error('provinsi_default')
                  {{ $message }}
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="zip-default" class="form-label label-small">Kode Pos</label>
                <input type="text" class="form-control" name="kodepos_default" id="zip-default" value="{{$user->address->zipcode}}" readonly>
                @error('kodepos_default')
                  {{ $message }}
                @enderror
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-6">
          @if (($details->street != $user->address->street) && ($details->street != ""))
            <div class="form-check">
              <input class="form-check-input" type="radio" name="address_type" id="custom" value="custom" checked>
              <label class="form-check-label" for="custom">Tambah Alamat</label>
            </div>
            <div class="form-box">
              <div>
                <label for="alamat-custom" class="form-label label-small">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat-custom" value="{{ old('alamat', $details->street) }}">
                @error('alamat')
                  {{ $message }}
                @enderror
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="kota-custom" class="form-label label-small">Kota/Kabupaten</label>
                  <input type="text" class="form-control" name="kabupaten" id="kota-custom" value="{{ old('kabupaten', $details->city) }}">
                  @error('kabupaten')
                    {{ $message }}
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="provinsi-custom" class="form-label label-small">Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" id="provinsi-custom" value="{{ old('provinsi', $details->region) }}">
                  @error('provinsi')
                    {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <label for="zip-custom" class="form-label label-small">Kode Pos</label>
                  <input type="number" class="form-control" name="kodepos" id="zip-custom" value="{{ old('kodepos', $details->zipcode) }}">
                  @error('kodepos')
                    {{ $message }}
                  @enderror
                </div>
              </div>
            </div>
          @else
            <div class="form-check">
              <input class="form-check-input" type="radio" name="address_type" id="custom" value="custom">
              <label class="form-check-label" for="custom">Tambah Alamat</label>
            </div>
            <div class="form-box">
              <div>
                <label for="alamat-custom" class="form-label label-small">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat-custom" value="{{ old('alamat') }}">
                @error('alamat')
                  {{ $message }}
                @enderror
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="kota-custom" class="form-label label-small">Kota/Kabupaten</label>
                  <input type="text" class="form-control" name="kabupaten" id="kota-custom" value="{{ old('kabupaten') }}">
                  @error('kabupaten')
                    {{ $message }}
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="provinsi-custom" class="form-label label-small">Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" id="provinsi-custom" value="{{ old('provinsi') }}">
                  @error('provinsi')
                    {{ $message }}
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <label for="zip-custom" class="form-label label-small">Kode Pos</label>
                  <input type="number" class="form-control" name="kodepos" id="zip-custom" value="{{ old('kodepos') }}">
                  @error('kodepos')
                    {{ $message }}
                  @enderror
                </div>
              </div>
            </div>
            @error('address_type')
              {{ $message }}
            @enderror
          @endif
        </div>

      </div>

      <div class="row my-5">
        <div class="col-md-6">
          <h5>Pilihan Ongkos Pengiriman (Karya dikirim dari {{$artwork->artist->region}})</h5>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="{{$artwork->shippingCost->jawa}}" id="jawa" {{ ($details->shipping) == $artwork->shippingCost->jawa ? "checked" : ""}}>
            <label class="form-check-label" for="jawa">
              Area Jawa Bali | Rp {{number_format($artwork->shippingCost->jawa)}}
            </label>
  
          </div>
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="{{$artwork->shippingCost->sumatera}}" id="sumatera" {{ ($details->shipping) == $artwork->shippingCost->sumatera ? "checked" : ""}}>
            <label class="form-check-label" for="sumatera">
              Area Sumatera | Rp {{number_format($artwork->shippingCost->sumatera)}}
            </label>

          </div>
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="{{$artwork->shippingCost->sulawesi}}" id="sulawesi" {{ ($details->shipping) == $artwork->shippingCost->sulawesi ? "checked" : ""}}>
            <label class="form-check-label" for="sulawesi">
              Area Sulawesi | Rp {{number_format($artwork->shippingCost->sulawesi)}}
            </label>

          </div>
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="{{$artwork->shippingCost->kalimantan}}" id="kalimantan" {{ ($details->shipping) == $artwork->shippingCost->kalimantan ? "checked" : ""}}>
            <label class="form-check-label" for="kalimantan">
              Area Kalimantan | Rp {{number_format($artwork->shippingCost->kalimantan)}}
            </label>

          </div>
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="{{$artwork->shippingCost->papua}}" id="papua" {{ ($details->shipping) == $artwork->shippingCost->papua ? "checked" : "" }}>
            <label class="form-check-label" for="papua">
              Area Papua | Rp {{number_format($artwork->shippingCost->papua)}}
            </label>

          </div>
          @error('flexRadioDefault')
            {{ $message }}
          @enderror
        </div>
      </div>

      <div class="d-flex justify-content-end mb-5">
        <a href="{{ route('carts.show', Auth::user()->cart) }}" class="btn-cancel me-3">Kembali</a>
        <button type="submit" class="btn-orange">Simpan</button>
      </div>
      
    </form>
    
  </div>
  
</x-app-layout>