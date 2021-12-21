<x-app-layout title="Pameran Publikasi">

    @slot('style')
        <style>
            .table-custom thead {
                border-top: 1px solid #B6B6B6;
                border-bottom: 1px solid #B6B6B6;
            }

            .btn-orange {
                border: none;
                color: white;
                padding: 8px 20px;
                font-weight: 700;
                font-size: 13px;
                border-radius: 10px;
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
                color: #888888;
                border-radius: 5px;
                transition: .3s;
            }

            .info-button:hover {
                background-color: #888888;
                color: white;
            }

            .modal-body {
                padding: 80px 0;
            }

            .modal-body p {
                margin: 0;
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
                    <th scope="col" class="text-center">ID karya</th>
                    <th scope="col" class="text-center">Nama Karya</th>
                    <th scope="col" class="text-center">Karya</th>
                    <th scope="col" class="text-center">Pilih</th>
                </tr>
            </thead>

            <tbody>
                <form action="{{ route('exhibitions.fix') }}" method="post">
                    <tr>
                        @foreach ($artworks as $artwork)
                            <td scope="row" class="align-middle text-center">PM-{{ $artwork->id }}</td>
                            <td class="align-middle text-center">{{ $artwork->name }}</td>
                            <td class="py-2 text-center"><img src="#" height="100px">{{ assets($artwork->thumbnail) }}
                            </td>
                            <td class="align-middle text-center">
                                <i class="text-warning">Publikasi</i>
                                <button type="button" class="btn info-button mx-2" data-bs-toggle="modal"
                                    data-bs-target="#info-modal"><i c lass="fa fa-info-circle"></i></button>
                            </td>
                        @endforeach

                    </tr>
                </form>
            </tbody>
        </table>

    </div>

    {{-- modal --}}
    <x-modal name="info-modal">

        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
            <h1 class="text-center page-title">Informasi Pameran</h1>
            <span class="underline-page-title text-center"></span>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <p>Status : <b class="text-warning">#</b></p>
                <p>ID Pameran : <b>#</b></p>
                <p>Nama Pameran : <b>#</b></p>
                <p>Total Karya : <b>#</b></p>
                <p>Tanggal Pameran : <b>#</b></p>
                <p>Waktu Pameran : <b>#</b></p>
                <p>Harga Tiket : <b>#</b></p>
                <p>Tiket Terjual : <b>#</b></p>

            </div>
        </div>

    </x-modal>

</x-app-layout>
