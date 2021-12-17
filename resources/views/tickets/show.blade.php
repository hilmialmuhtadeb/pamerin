<x-app-layout title="Tiket Saya">

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

        <div class="ms-auto mb-5 text-end">
            <li class="nav-item dropdown">
                <a class="btn turun-btn dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item item-turun" href="#">Semua Tiket</a></li>
                    <li><a class="dropdown-item item-turun" href="#">Menunggu Pembayaran</a></li>
                    <li><a class="dropdown-item item-turun" href="#">Akan Datang</a></li>
                    <li><a class="dropdown-item item-turun" href="#">Selesai</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Keluar</button>
                        </form>
                    </li>
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
                        <th scope="col" class="text-center w-30">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($user->exhibition as $tiket)
                    <tr>
                        <td class="align-middle text-center">{{ $tiket->pivot->code}}</td>
                        <td class="align-middle text-center">{{$tiket->name}}</td>
                        <td class="align-middle text-center">Rp. {{ number_format($tiket->price)}}</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('tickets.confirm') }}" class="rounded btn-orange btn-address">Unggah Pembayaran</a>
                        </td>
                        <td class="align-middle text-center text-red"><i>Menunggu Pembayaran</i>
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
                <p>Status : <i>Menunggu Pembayaran</i></p> 

            </div>
        </div>
        
    </x-modal>
    @endforeach

</x-app-layout>