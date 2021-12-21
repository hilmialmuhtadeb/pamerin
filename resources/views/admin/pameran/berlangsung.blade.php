<x-app-layout title="Admin Sedang Berlangsung Pameran">
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
        <h1 class="text-center page-title">Daftar Pameran : Sedang Berlangsung</h1>
        <span class="underline-page-title text-center"></span>
      </div>
      <table class="table-custom table table-borderless table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center">ID Pameran</th>
              <th scope="col" class="text-center">Nama Pameran</th>
              <th scope="col" class="text-center">Tanggal Berlangsung</th>
              <th scope="col" class="text-center">Status</div>
            </tr>
          </thead>
          <tbody>   
            @foreach ($exhibitions as $exhibition)                
            <tr>
              <td scope="row" class="align-middle text-center">{{ $exhibition->id }}</td>
              <td class="align-middle text-center">{{ $exhibition->name }}</td>
              <td class="align-middle text-center">{{ $exhibition->date }}</td>
              <td class="align-middle text-center">
                <i class="text-success">Sedang Berlangsung</i>
                <a class="info-button mx-2"><i class="fa fa-info-circle"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
  </x-app-layout>