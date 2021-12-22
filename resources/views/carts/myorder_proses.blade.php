<x-app-layout title="Pesanan Saya">

  @slot('style')
      <style>
        .table-cart thead {
          border-top: 1px solid #B6B6B6;
          border-bottom: 1px solid #B6B6B6;
        }
        .table-cart th {
          padding: 20px 0;
          width: 20%;
          font-size: 16px;
          font-weight: 700;
        }
        .table-cart th.w-30 {
          width: 30%;
        }
        .table-cart tbody {
          background-color: white;
          box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.247);
          border-radius: 5px;
        }
        .btn-address {
          padding: 8px 25px;
        }
        h5.cart-amount-title {
          font-size: 16px;
          font-weight: 500;
        }
        .table-amount {
          width: 100%;
        }
        .table-amount th {
          font-size: 14px;
          font-weight: 600;
          background-color: white;
          padding: 5px 10px;
          width: 50%;
        }
        .table-amount td {
          font-size: 14px;
          font-weight: 400;
          padding: 5px 10px;
          width: 50%;
        }
        .p-table-amount td {
          font-size: 14px;
          font-style: italic;
          padding: 5px 10px;
          width: 50%;
        }
        .table-amount tr {
          border-top: 1px solid #B6B6B6;
          border-bottom: 1px solid #B6B6B6;
        }
        .btn-checkout {
          border: 0;
          padding: 8px 0;
          font-size: 14px;
          font-weight: 700;
        }
        .info-button {
          color: white;
          border-radius: 5px;
          transition: .3s;
        }
        .info-button {
          background-color: #B6B6B6;
        }
        .info-button:hover {
          background-color: #888888;
          color: white;
        }
        .turun-btn{
          background-color: transparent;
          border-color: #888888;
          border-radius: 5px;
        }
        .item-turun{
          background-color: rgb(255, 255, 255, 0.5);
          border-color: #888888;
          border-radius: 5px;
        }
        .li{
          list-style-type: none;
        }
      </style>
  @endslot

  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center mb-5">
      <h1 class="text-center page-title">Pesanan Saya</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <div class="ms-auto mb-5 text-end">
    <li class="nav-item dropdown">
            <a class="btn turun-btn dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Akan Datang
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item item-turun" href="{{ route('carts.show_myorder', Auth::user()->cart) }}">Semua Pesanan</a></li>
              <li><a class="dropdown-item item-turun" href="{{ route('carts.waiting_myorder', Auth::user()->cart) }}">Menunggu Pembayaran</a></li>
              <li><a class="dropdown-item item-turun" href="#">Akan Datang</a></li>
              <li><a class="dropdown-item item-turun" href="{{ route('carts.selesai_myorder', Auth::user()->cart) }}">Selesai</a></li>
            </ul>
</div>
    
    <div class="row">
      <table class="table-cart table table-borderless table-striped">
        <thead>
          <tr>
            <th scope="col" class="text-center">ID Pesanan</th>
            <th scope="col" class="text-center">Nama Karya</th>
            <th scope="col" class="text-center">Total Bayar</th>
            <th scope="col" class="text-center">Aksi</th>
            <th scope="col" class="text-center w-30">Status</th>
          </tr>
        </thead>

        <tbody>   
          @foreach ($details as $detail)
          <tr>
            <td class="align-middle text-center">{{ $detail->id_pesanan }}</td>
            <td class="align-middle text-center">{{ $detail->artwork->name }}</td>
            <td class="align-middle text-center">Rp {{ number_format( (float)$detail->price + (float)$detail->shipping ) }}</td>
            <td class="align-middle text-center">
              <a> - </a>
            </td>
              @if ($detail->status == 2)
                <td class="align-middle text-center text-red"><i>Menunggu Pembayaran</i>
              @elseif ($detail->status == 3)
                <td class="align-middle text-center text-red"><i>Dalam pengiriman</i>
              @elseif ($detail->status == 4)
                <td class="align-middle text-center text-red"><i>Selesai</i>
              @endif
            <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-modal{{$detail->id}}"><i class="fas fa-info"></i></button>
            </td>
          </tr>
          @endforeach        
        </tbody>
      </table>
      
    </div>
  </div>
</div>

  @foreach ($details as $detail)
  <x-modal name="pembayaran{{$detail->id}}">

    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Kirim Bukti Pembayaran</h1>
        <span class="underline-page-title text-center"></span>
    </div>

    <div class="row justify-content-center">
    <div class="col-8">
            <p>Total Pembayaran : <b>Rp {{ number_format( (float)$detail->price + (float)$detail->shipping ) }}</b></p>
            <p>Metode Pembayaran : </p>
            <form action="/cart/bayar/{{$user->id}}/{{$detail->artwork->id}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" name="code" value="{{ $detail->id_pesanan }}">
                    <div class="form-check">
                            <b>BANK BRI</b> 1029382131923<br>(DEODIA LORENSA)
                            </label></div>
                            <div class="form-check mb-5">
                            <b>OVO & DANA</b> 085612345678<br>(DEODIA LORENSA)
                            </label></div>
                            <p>Unggah Bukti Pembayaran (.jpg / .jpeg)</p>
                            <div class="mb-3">
                            <input type="file" name="bayar" id="thumbnail" class="form-control">
                            @error('bayar')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <br>
                            <button class="rounded btn-orange btn-address" type="submit">Simpan</button>
                    </div>
            </form> 
        </div>
    </div>
  </x-modal>
  
    <x-modal name="info-modal{{$detail->id}}">
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Informasi Karya Seni</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <div class="row justify-content-center">
        <div class="col-8">

          <p>ID Pesanan : <b>{{ $detail->id_pesanan }}</b></p>
          <p>Nama Karya : <b>{{ $detail->artwork->name }}</b></p>
          <p>Seniman : <b>{{ $detail->artwork->artist->name }}</b></p>
          <p>Total Harga : <b>Rp {{ number_format( (float)$detail->price + (float)$detail->shipping ) }}</b></p>
          <p>Status : <i class="text-red">Menunggu Pembayaran</i></p>
          
        </div>
      </div>
    </x-modal>
  @endforeach
  
</x-app-layout>