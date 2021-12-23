<x-app-layout title="Rincian Pembelian">

  @slot('style')
      <style>
        .breadcrumb-item>a{
          text-decoration: none;
          color: #F6AE2D;
        }
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
          box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.247);
          background-color: rgb(255, 255, 255 );
          border-radius: 5px;
        }
        .btn-address {
          padding: 8px 25px;
        }
        h5.cart-amount-title {
          font-family: 'Inter';
          font-size: 18px;
          font-weight: bold;
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
        .exhibition-title {
          font-size: 25px;
          font-weight: 800;
        }
        .exhibition-info {
          margin: 0;
          font-size: 14px;
        }
        .exhibition-description {
          font-size: 16px;
        }
        h5.exhibition-description{
          font-weight: bold;
        }
      </style>
  @endslot

  <div class="container">
  <div class="row mb-4">
      @include('components._breadcrumbs')
    </div>
    <div class="d-flex flex-column align-items-center justify-content-center mb-5">
      <h1 class="text-center page-title">Rincian Pembelian</h1>
      <span class="underline-page-title text-center"></span>
    </div>
    
    <div class="row">
      <div class="col-7">
        <table class="table-cart table table-borderless table-striped mr-4">
        <thead>
          <tr>
            <th scope="col-3" class="text-center">Pameran</th>
            <th scope="col-4" class="text-center">Detail Pameran</th>
          </tr>
      </thead>

        <tbody>   
          <tr>
            <td scope="row" class="text-center py-2"><img src="{{asset($exhibition->thumbnail) }}" class="img-fluid ms-2 img-exhibition rounded"></td>
            <td class="align-middle text-left">
            <ul>
              <span class="ms-2 text-black"><b>{{ $exhibition->name }}</b></span><br>
              <span class="ms-2 mt-1 text-orange">{{ date_format(date_create($exhibition->date), "l, d F Y") }}</span>
              </ul>
            </td>
          </tr>
        </tbody>
        </table>
      </div>

      <div class="col-md-4 ms-4 justify-content-end">
      
        <div class="row justify-content-end">
            <div class="card-exhibition-body mt-1">
              <h5 class="cart-amount-title mt-3 ms-1 mb-3">Rincian Pembayaran</h5> 

              <div class="row">
              <div class="col-md-4">
                 <span class="exhibition-description ms-1"><b>Subtotal</b></span><br>
                 <span class="exhibition-description ms-1"><b>Kode Unik</b></span>
              </div>
              <div class="col-md-8">
                 <span class="exhibition-description">Rp {{ number_format($exhibition->price) }}</span><br>
                 <span class="exhibition-description">Rp  {{$unique}}</span>
              </div>
              <div class="col-xl-12 exhibition-description"><hr></div>
              <div class="col-md-4">
                 <span class="exhibition-description ms-1"><b>TOTAL</b></span>
              </div>
              <div class="col-md-8">
                 <span class="exhibition-description">Rp  {{number_format($exhibition->price + $unique)}}</span>
              </div>
              </div>
              <form action="{{ route('tickdt.store') }}" method="post">
              @csrf
              <input type="hidden" name="exhibition_id" value="{{ $exhibition->id }}">
              <input type="hidden" name="price" value="{{ $exhibition->price }}">
              <input type="hidden" name="unique" value="{{ $unique }}">
              <input type="hidden" name="total" value="{{ $exhibition->price + $unique}}">
              
              <div class="d-grid my-4">
                <button type="submit" class="card-exhibition-button  btn-checkout rounded-3">Pesan Sekarang</button>
              </div>
            </form>
            </div>
        </div>

          <div class="row justify-content-end mt-4 mb-5">
          <div class="card-exhibition-body">
              <h5 class="cart-amount-title mt-2 ms-2">Cara Pembayaran</h5>
              <ul>
                <li>Bayar sejumlah total pembayaran ke: <br>
<b class="ms-3">BANK BRI</b> 1029382131923 <br>
(DEODIA LORENSA) <br>
<b class="ms-3">OVO & DANA</b> 085612345678 <br>
(DEODIA LORENSA)</li>
<li>Batas waktu pembayaran 1x24 setelah Anda melakukan konfirmasi pembelian</li>
<li>Admin akan mengecek pembayaran Anda maksimal 2 hari kerja setelah Anda melakukan pembayaran</li>
<li>Jika pembayaran Anda terverifikasi maka pesanan Anda akan segera kami proses</li>
              </ul>
              <p class="exhibition-description">
              
            </div>
      </div>
    </div>
  </div>  
</x-app-layout>