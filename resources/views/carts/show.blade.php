<x-app-layout title="Keranjang {{ $cart->user->name }}">

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
      </style>
  @endslot

  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center mb-5">
      <h1 class="text-center page-title">Keranjang Saya</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <div class="row">

      <table class="table-cart table table-borderless table-striped">
        <thead>
          <tr>
            <th scope="col" class="text-center w-30">Karya Seni</th>
            <th scope="col" class="text-center">Nama Karya Seni</th>
            <th scope="col" class="text-center">Harga</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>

        <tbody>   
          @foreach ($details as $detail)
          <tr>
            <td scope="row" class="text-center py-2"><img src="{{ $detail->artwork->takeImage }}" height="100px"></td>
            <td class="align-middle text-center">{{ $detail->artwork->name }}</td>
            <td class="align-middle text-center">Rp{{ number_format($detail->price)}}</td>
            <td class="align-middle text-center">
              <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>

    <div class="d-flex justify-content-end my-4">
      <a href="{{ route('carts.edit', $cart) }}" class="rounded btn-orange btn-address">Isi Alamat</a>
    </div>

    <div class="row justify-content-end">
      <div class="col-md-5">
        <h5 class="cart-amount-title">Total Keranjang</h5>

        <table class="table-amount">
          <tr>
            <th>Subtotal</th>
              <td class="align-middle">Rp. {{ number_format($subtotal)}}</td>
          </tr>
          <tr>
            <th>Ongkos Kirim</th>
            <td>Rp0</td>
          </tr>
          <tr>
            <th>Kode Unik</th>
            <td>Rp. {{$unique}}</td>
          </tr>
          <tr>
            <th>TOTAL</th>
            <td>Rp{{ number_format($subtotal + $unique)}}</td>
          </tr>
        </table>
        
        <form action="#" method="post" class="d-grid my-4">
          @csrf
          <button type="submit" class="btn-orange btn-checkout rounded-3">CHECKOUT</button>
        </form>
      </div>
    </div>
      
    
  </div>
  
</x-app-layout>