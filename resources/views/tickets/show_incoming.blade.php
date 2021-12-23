<x-app-layout title="Tiket Saya">

    @slot('style')
    <style>
        .table-cart thead {
            border-top: 1px solid #B6B6B6;
            border-bottom: 1px solid #B6B6B6;
        }

        .table-cart th {
            padding: 20px 0;
            width: 10%;
            font-size: 16px;
            font-weight: 700;
        }

        .table-cart th.w-30 {
            width: 15%;
        }

        .table-cart tbody {
            background-color: white;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.247);
            border-radius: 5px;
        }

        .btn-address {
            padding: 8px 25px;
        
        }
        .btn-masuk-pameran {
            padding: 8px 20px;
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

        .turun-btn {
            background-color: transparent;
            border-color: #888888;
            border-radius: 5px;
        }

        .item-turun {
            background-color: rgb(255, 255, 255, 0.5);
            border-color: #888888;
            border-radius: 5px;
        }

        .li {
            list-style-type: none;
        }
    </style>
    @endslot

    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center mb-5">
            <h1 class="text-center page-title">Tiket Saya</h1>
            <span class="underline-page-title text-center"></span>
        </div>

        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
        @endif

        <div class="ms-auto mb-5 text-end">
            <li class="nav-item dropdown">
                <a class="btn turun-btn dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Akan Datang
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item item-turun" href="#">Semua Tiket</a></li>
                    <li><a class="dropdown-item item-turun" href="#">Menunggu Pembayaran</a></li>
                    <li><a class="dropdown-item item-turun" href="#">Akan Datang</a></li>
                    <li><a class="dropdown-item item-turun" href="#">Selesai</a></li>
                </ul>
        </div>

        <div class="row">
            <table class="table-cart table table-borderless table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ID Tiket</th>
                        <th scope="col" class="text-center">Nama Pameran</th>
                        <th scope="col" class="text-center">Total Bayar</th>
                        <th scope="col" class="text-center">Aksi</th>
                        <th scope="col" class="text-center">Cetak</th>
                        <th scope="col" class="text-center w-30 align-item-center">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($user->exhibition as $tiket)
                    <tr>
                        <td class="align-middle text-center">{{ $tiket->pivot->code}}</td>
                        <td class="align-middle text-center">{{$tiket->name}}</td>
                        <td class="align-middle text-center">Rp. {{ number_format($tiket->pivot->summary)}}</td>
                        <td class="align-middle text-center">
                        @if($tiket->pivot->status_id == 1)
                            <button type="button" class="rounded btn-orange btn-address" data-bs-toggle="modal"
                                data-bs-target="#pembayaran{{ $tiket->id }}">Unggah Pembayaran</button>
                        @elseif($tiket->pivot->status_id == 3)
                            <button type="button" class="rounded btn-orange btn-address" data-bs-toggle="modal"
                                data-bs-target="#masuk{{ $tiket->id }}">Tautkan Tiket</button>
                        @else
                        <a> - </a>
                        @endif
                        <td class="align-middle text-center">
                            @if($tiket->pivot->status_id == 3)
                                <a href=" " class="rounded btn-orange btn-address">Cetak Tiket</a>
                            @else 
                                <a> - </a>
                            @endif
                        </td>
                        </td>`
                        @if($tiket->pivot->status_id == 1)
                        <td class="align-middle text-center text-red"><i>Menunggu Pembayaran</i>
                        @elseif($tiket->pivot->status_id == 2)
                        <td class="align-middle text-center text-orange"><i>Akan Datang</i>
                        @elseif($tiket->pivot->status_id == 3)
                        <td class="align-middle text-center text-green"><i>Sedang berlangsung</i>
                        @elseif($tiket->pivot->status_id == 4)
                        <td class="align-middle text-center text-green"><i>Selesai</i>
                        @endif
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#info{{ $tiket->id }}"><i class="fas fa-info"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    </div>
    @foreach($user->exhibition as $tiket)
    <x-modal name="info{{ $tiket->id }}">

        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
            <h1 class="text-center page-title">Informasi Karya Seni</h1>
            <span class="underline-page-title text-center"></span>
        </div>

        <div class="row justify-content-center">
             <div class="col-8">

                <p>ID Tiket : <b>{{ $tiket->pivot->code}}</b></p>
                <p>Nama Pameran : <b>{{$tiket->name}}</b></p>
                <p>Tanggal Pameran : <b>{{$tiket->date}}</b></p>
                <p>Waktu Pameran : <b>{{$tiket->start}}-{{$tiket->end}}</b></p>
                <p>Total Harga : <b>Rp.{{ number_format($tiket->price)}}</b></p>
                @if($tiket->pivot->status_id == 1)
                <p>Status : <i class="text-red">Menunggu Pembayaran</i></p>
                @elseif($tiket->pivot->status_id == 2)
                <p>Status : <i class="text-orange">Akan Datang</i></p>
                @elseif($tiket->pivot->status_id == 3)
                <p>Status : <i class="text-green">Sedang berlangsung</i>
                @elseif($tiket->pivot->status_id == 4)
                <p>Status : <i class="text-green">Selesai</i>
                @endif
            </div>
        </div>
    </x-modal>
    @endforeach
    
    @foreach($user->exhibition as $tiket)
    <x-modal name="masuk{{ $tiket->id }}">

        <div class="d-flex justify-content-beetwen flex-column align-items-center mb-5">
            <h1 class="text-left page-title">{{$tiket->name}}</h1>
            <span class="underline-page-title text-center"></span>
        </div>

        <div class="row justify-content-beetwen">
            <div class="col-7   ">

                <p>1. Buka aplikasi PamerIn di handphone Anda</b></p>
                <p>2. Masuk ke Akun Saya > Tiket Saya</b></p>
                <p>3. Lalu, lihat daftar tiket yang “Akan Datang”</b></p>
                <p>4. Klik tiket yang ingin Anda lihat</b></p>
                <p>5. Klik “Tautkan Tiket”</b></p>
                <p>6. Ketikkan ID Tiket di kolom yang tertera</i></p>  

            </div>
            <div class="col-5">
                <div class="row justify-content-center align-items-center">
                    <p>ID Tiket</p>
                    <div class="col-sm-8">
                    <form action="{{ route('tickets.store') }}" method="post">
                        <input type="text" name="id_tiket" id="id_tiket"></input>
                    </form>
                    </div>
                    <div class="col-sm-4">
                        <a href="/ticketsdetail" class="btn-masuk-pameran rounded btn-orange"><i class="fa fa-sign-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </x-modal>
    @endforeach


    @foreach($user->exhibition as $tiket)
    <x-modal name="pembayaran{{ $tiket->id }}">

        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
            <h1 class="text-center page-title">Kirim Bukti Pembayaran</h1>
            <span class="underline-page-title text-center"></span>
        </div>

        <div class="row justify-content-center">
        <div class="col-8">
                <p>Total Pembayaran : <b>Rp {{number_format($tiket->pivot->summary)}}</b></p>
                <p>Metode Pembayaran : </p>

                <form action="/tickets/show/{{$user->id}}/{{$tiket->id}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-check">
                                <b>BANK BRI</b> 1029382131923<br>(DEODIA LORENSA)
                                </label></div>
                                <div class="form-check mb-5">
                                <b>OVO & DANA</b> 085612345678<br>(DEODIA LORENSA)
                                </label></div>
                                <p>Unggah Bukti Pembayaran (.jpg / .jpeg)</p>
                                <div class="mb-3">
                                <input type="file" name="bayar" id="thumbnail" class="form-control">
                                @error('thumbnail')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <!-- <div class="mb-3 mt-5">
                                <a href="{{ route('tickets.show') }}" class="rounded btn-orange btn-address" >Simpan</a>
                                </div> -->
                                <br>
                                <button class="rounded btn-orange btn-address" type="submit">Simpan</button>
                        </div>
                </form> 
            </div>
        </div>
    </x-modal>
    @endforeach
    

</x-app-layout>