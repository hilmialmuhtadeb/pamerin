<x-app-layout title="Admin Selesai Pameran">
    @slot('style')
    <style>
      .table-custom thead {
        border-top: 1px solid #B6B6B6;
        border-bottom: 1px solid #B6B6B6;
      }
      .table-custom th {
        padding: 20px 0;
        width: 20%;
        font-size: 16px;
        font-weight: 700;
      }
      .table-custom tbody {
        background-color: white;
      
      }
      .modal-body {
        padding: 80px 0;
      }
      .modal-body p {
        margin: 0;
      }
      .info-button {
        color: rgb(196, 196, 196);
        border-radius: 5px;
        transition: .3s;
      }
      .info-button:hover {
          color: rgb(0, 0, 0);
      }
      .submit-button {
        width: 100px;
        border-radius: 5px;
        padding: 1px ;
        font-weight: 600;
        font-size: 14px;
        border: 0;
        color: white;
      }  
    </style>
    @endslot
    <div class="container">
  
      <div class="d-flex justify-content-center flex-column align-items-center mb-5">
        <h1 class="text-center page-title">Daftar Pameran : Selesai</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Pameran</th>
              <th scope="col" class="text-center">Nama Pameran</th>
              <th scope="col" class="text-center">Besar Dana</th>
              <th scope="col" class="text-center">Aksi</th>
              <th scope="col" class="text-center">Status</div>
            </tr>
          </thead>
          <tbody>
            @foreach ($exhibitions as $exhibition)                
            <tr>
              <td scope="row" class="align-middle text-center">{{ $exhibition->id }}</td>
              <td class="align-middle text-center">{{ $exhibition->name }}</td>
              <td class="align-middle text-center">#</td>
              <td class="align-middle text-center">
                @if ($exhibition->stages<=3)                    
                <form action="{{ route('exhibitions.addStages', $exhibition) }}" method="post">
                  @csrf
                  @method('patch')
                  <button type="submit" class="submit-button bg-orange rounded ">Transfer</button>
                </form>
                @endif
              </td>
              <td class="align-middle text-center">
                <i class="text-{{ $color[($exhibition->stages == 3)] }}">{{ $text[($exhibition->stages == 3)] }} Transfer</i>
                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-pembayaran-{{ $exhibition->id }}"><i class="fa fa-info-circle"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>

      @foreach ($exhibitions as $exhibition)          
      <x-modal name="info-pembayaran-{{ $exhibition->id }}">
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
          <h1 class="text-center page-title">Informasi Pembayaran Karya Seni</h1>
          <span class="underline-page-title text-center"></span>
        </div>
        <div class="row justify-content-center">
          <div class="col-8">
            <p>ID Pameran : <b>{{ $exhibition->id }}</b></p>
            <p>Nama Pameran : <b>{{ $exhibition->name }}</b></p>
            <p>Tiket Terjual : <b>#</b></p>
            <p>Seniman : <b>{{ $exhibition->artist->name }}</b></p>
            <p>Besar Dana : <b>#</b></p>
            <p>Status : <b class="text-{{ $color[($exhibition->stages == 3)] }}">{{ $text[($exhibition->stages == 3)] }} Transfer</b></p>
          </div>
        </div>
      </x-modal>
      @endforeach

      </table>
  </div>
  </x-app-layout>