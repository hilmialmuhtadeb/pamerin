<x-app-layout title="Tambah Karya Seni">

    @slot('style')
        <style>
            .label-small {
                font-size: 14px;
                color: #828282;
                margin-bottom: 0;
            }

            .form-control,
            .form-select {
                font-size: 14px;
                box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.185);
            }

            .submit-button {
                font-size: 14px;
                font-weight: 700;
                width: 250px;
                padding: 10px;
                border: 0;
                color: white;
            }

            .button-wrapper {
                text-align: right;
            }

            .step {
                font-size: 16px;
            }

        </style>
    @endslot

    <div class="container">

        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
            <h1 class="text-center page-title">Tambah Pameran</h1>
            <span class="underline-page-title text-center"></span>
        </div>

        <p class="step">Langkah 1 : <b>Informasi Karya</b></p>

        <form action="{{ route('exhibitions.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="ms-3 row">

                <div class="col-md-5">

                    <div class="mb-2">
                        <label for="name" class="form-label label-small">Nama Pameran</label>
                        <input type="text" name="name" class="form-control" id="name">
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="date" class="form-label label-small">Tanggal Pameran</label>
                        <input type="date" name="date" class="form-control" id="date">
                        @error('date')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="start" class="form-label label-small">Waktu Mulai (dalam WIB)</label>
                        <input name="start" type="datetime-local" class="form-control time-picker" id="start">
                        @error('start')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="end" class="form-label label-small">Waktu Berakhir (dalam WIB)</label>
                        <input name="end" type="datetime-local" class="form-control time-picker" id="end">
                        @error('end')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="price" class="form-label label-small">Harga Tiket</label>
                        <input name="price" type="number" class="form-control" id="price">
                        @error('price')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="description" class="form-label label-small">Deskripsi (maks 100 kata)</label>
                        <textarea name="description" id="description" class="form-control" cols="30"
                            rows="10"></textarea>
                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label label-small mb-2">Unggah Poster Pemeran (.jpg/.jpeg/.png)</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                        @error('thumbnail')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

            </div>

            <div class="button-wrapper">
                <button type="submit" class="submit-button bg-orange rounded mb-5">LANJUT</button>
            </div>
        </form>

    </div>
</x-app-layout>
