<x-app-layout title="Tambah Karya Seni">

  @slot('style')
      <style>
        .label-small {
          font-size: 14px;
          color: #828282;
          margin-bottom: 0;
        }
        .form-control, .form-select {
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
      <h1 class="text-center page-title">Tambah Karya Seni</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <p class="step">Langkah 1 : <b>Informasi Karya</b></p>

    <form action="{{ route('artworks.store') }}" method="post" enctype="multipart/form-data">
    @csrf

      <div class="ms-3 row">

        <div class="col-md-5">

          <div class="mb-2">
            <label for="category" class="form-label label-small">Kategori</label>
            <select class="form-select" name="category" aria-label="Default select example">
              <option disabled selected>Pilih Satu!</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category')
                  <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-2">
            <label for="name" class="form-label label-small">Nama Karya</label>
            <input type="text" name="name" class="form-control" id="name">
            @error('name')
                  <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-2">
            <label for="media" class="form-label label-small">Media</label>
            <select class="form-select" name="media" aria-label="Default select example">
              <option disabled selected>Pilih Satu!</option>
              <option value="Kanvas">Kanvas</option>
              <option value="Kertas">Kertas</option>
              <option value="Digital">Digital</option>
              <option value="Kaca">Kaca</option>
              <option value="Lain-lain">Lain-lain</option>
              </select>
            @error('media')
            <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-2">
            <label for="size" class="form-label label-small">Ukuran</label>
            <select class="form-select" name="size" aria-label="Default select example">
              <option disabled selected>Pilih Satu!</option>
              <option value="10x10cm">10x10cm</option>
              <option value="10x20cm">10x20cm</option>
              <option value="20x20cm">20x20cm</option>
              <option value="20x30cm">20x30cm</option>
              <option value="30x30cm">30x30cm</option>
              <option value="30x40cm">30x40cm</option>
              <option value="40x60cm">40x60cm</option>
              <option value="Lain-lain">Lain-lain</option>
            </select>
            @error('size')
            <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-2">
            <label for="year" class="form-label label-small">Tahun Karya Dibuat</label>
            <input name="year" class="form-control" id="year">
            @error('year')
                  <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-2">
            <label for="description" class="form-label label-small">Deskripsi (maks 100 kata)</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            @error('description')
                  <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label label-small mb-2">Unggah Gambar Karya Seni (.jpg/.jpeg/.png)</label>
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
