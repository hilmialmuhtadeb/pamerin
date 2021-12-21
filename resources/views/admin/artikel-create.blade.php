<x-app-layout title="Tambah Artikel">

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
            width: 100px;
            border-radius: 5px;
            padding: 5px;
            font-weight: 700;
            font-size: 16px;
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
        <h1 class="text-center page-title">Tambah Artikel</h1>
        <span class="underline-page-title text-center"></span>
      </div>
        <div class="ms-3 row d-flex justify-content-center ">
  
          <div class="col-md-5">
            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-2">
                <label for="title" class="form-label label-small">Nama Artikel</label>
                <input type="text" name="title" class="form-control" id="title">
                @error('title')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
  
              <div class="mb-3">
                  <label class="form-label label-small mb-2">Unggah Gambar Artikel (.jpg/.jpeg/.png)</label>
                  <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                  @error('thumbnail')
                        <span class="error-message">{{ $message }}</span>
                  @enderror
                </div>
  
              <div class="mb-2">
                <label for="text" class="form-label label-small">Deskripsi (maks 100 kata)</label>
                <textarea name="text" id="text" class="form-control" cols="30" rows="10"></textarea>
                @error('text')
                      <span class="error-message">{{ $message }}</span>
                @enderror
              </div>
  
              <div class="button-wrapper my-3">
                <button class="submit-button bg-grey rounded mb-5">Batal</button>
                <button type="submit" class="submit-button bg-orange rounded mb-5">Tambah</button>
              </div>
            </form>
  

          </div>
  
        </div>
  
      </form>
  
    </div>
    
  </x-app-layout>