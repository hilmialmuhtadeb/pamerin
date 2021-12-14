<x-app-layout title="Admin Pengajuan Pameran">
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
    .info-button {
      color: rgb(196, 196, 196);
      border-radius: 5px;
      transition: .3s;
    }
    .info-button:hover {
      color: rgb(0, 0, 0);
    }
    .modal-body {
      padding: 80px 0;
    }
    .modal-body p {
      margin: 0;
    }
    .submit-button {
      width: 100px;
      border-radius: 5px;
      padding: 1px ;
      font-weight: 600;
      font-size: 16px;
      border: 0;
      color: white;
    }  
  </style>
@endslot
  <div class="container">

    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title">Daftar Pameran : Pengajuan</h1>
      <span class="underline-page-title text-center"></span>
    </div>
    <table class="table-custom table table-borderless table-striped">
        <thead>
          <tr>
            <th scope="col" class="text-center">ID Pameran</th>
            <th scope="col" class="text-center">Nama Pameran</th>
            <th scope="col" class="text-center">Tanggal Berlangsung</th>
            <th scope="col" class="text-center">Aksi</th>
            <th scope="col" class="text-center">Status</div>
          </tr>
        </thead>
  <tbody>   
    <tr>
      <td scope="row" class="align-middle text-center">#</td>
      <td class="align-middle text-center">#</td>
      <td class="align-middle text-center">#</td>
      <td class="align-middle text-center">
      <button type="submit" class="submit-button bg-orange rounded ">Setuju</button>
      <td class="align-middle text-center">
        <i class="text-orange">Pengajuan</i>
        <button type="button" class="btn info-button mx-2" data-bs-toggle="modal" data-bs-target="#info-pengajuan"><i class="fa fa-info-circle"></i></button>
      </td>
    </tr>
    <tr>
      <td scope="row" class="align-middle text-center">#</td>
      <td class="align-middle text-center">#</td>
      <td class="align-middle text-center">#</td>
      <td class="align-middle text-center">
      <button type="submit" class="submit-button bg-orange rounded ">Publikasi</button>
      <td class="align-middle text-center">
        <i class="text-orange">Telah Disetujui</i>
        <a href="{{ route('admin.detail-pameran') }}" type="button" class="btn info-button mx-2" ><i class="fa fa-info-circle"></i></button>
      </td>
    </tr>
  </tbody>
</table>
<x-modal name="info-pengajuan">
  <div class="d-flex justify-content-center flex-column align-items-center mb-5">
    <h1 class="text-center page-title">Detail Pameran</h1>
    <span class="underline-page-title text-center"></span>
  </div>
  <div class="row justify-content-center">
    <div class="col-8">
      <p>Nama Pameran : <b>#</b></p>
      <p>Poster Pameran : </p>
      <img src="">
      <p>Tanggal : <b>#</b></p>
      <p>Waktu Mulai : <b>#</b></p>
      <p>Waktu Berakhir : <b>#</b></p>
      <p>Harga Tiket : <b>#</b></p>
      <p>Deskripsi : <b>#</b></p>
      <p>No.Handphone : <b>#</b></p>
      <p>Email : <b>#</b></p>
      <p>Jumlah Karya : <b>#</b></p>
        <a href="{{ route('admin.artikel-create') }}" class=" add-button btn-orange rounded"><i></i> Lihat Deatil</a>

    </div>
  </div>
</x-modal>

</div>
      </x-app-layout>