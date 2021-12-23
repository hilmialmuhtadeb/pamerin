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
            <td scope="row" class="text-center py-2"><img src="{{asset($detail->artwork->thumbnail) }}" height="100px"></td>
            <td class="align-middle text-center">{{ $detail->artwork->name }}</td>
            <td class="align-middle text-center">Rp {{ number_format($detail->price)}}</td>
            <td class="align-middle text-center">
              <div class="row justify-content-beetwen">
                <div class="col-6"> 
                  @if ($detail->shipping != NULL)
                    <a href="/editalamat/{{$detail->id}}/{{$detail->cart_id}}/{{$detail->artwork->id}}" class="rounded btn-green btn-address">Isi Alamat</a>
                  @else
                    <a href="/editalamat/{{$detail->id}}/{{$detail->cart_id}}/{{$detail->artwork->id}}" class="rounded btn-orange btn-address">Isi Alamat</a>
                  @endif
                </div>
                <div class="col-6">
                <form action="{{ route('details.destroy', $detail->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="unique_number" value="{{ $cart->unique_number }}">
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>

                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>


    
    <div class="row justify-content-end">
      
      <div class="col-md-5">
        <h5 class="cart-amount-title">Total Keranjang</h5>

        <table class="table-amount">
          <tr>
            <th>Subtotal</th>
              <td class="align-middle">Rp {{ number_format($cart->subtotal) }}</td>
          </tr>
          <tr>
            <th>Ongkos Kirim</th>
            <td>Rp {{ number_format($cart->ongkir) }}</td>
          </tr>
          <tr>
            <th>Kode Unik</th>
            <td>Rp {{ number_format($cart->unique_number) }}</td>
          </tr>
          <tr>
            <th>TOTAL</th>
            <td>Rp {{ number_format($cart->summary) }}</td>
          </tr>
        </table>
        
        <form action="/carts/checkout/{{$cart->id}}" method="post" class="d-grid my-4">
          @if( number_format($cart->summary) > 0 && $ongkir != 0)
          @csrf
            <button type="submit" class="btn-orange btn-checkout rounded-3">CHECKOUT</button>
        </form>
          @elseif (count($details) == 0)
            <button type="button" class="btn-orange btn-checkout rounded-3" data-bs-toggle="modal" data-bs-target="#danger-kosong">CHECKOUT</button>
          @else
            <button type="button" class="btn-orange btn-checkout rounded-3" data-bs-toggle="modal" data-bs-target="#danger-data-kosong">CHECKOUT</button>
          @endif
      </div>
    </div>
  </div>
  
  <x-modal name="danger-kosong">
    <h4 class="text-center text-red">Anda belum menambahkan apapun !</h4>
  </x-modal>

  <x-modal name="danger-data-kosong">
    <h4 class="text-center text-red">Harap isi alamat tujuan pengiriman!</h4>
  </x-modal>

</x-app-layout>