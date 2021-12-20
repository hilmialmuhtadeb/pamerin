<x-app-layout title="Semua Pameran">
  
  <div class="container">

    <div class="d-flex justify-content-center flex-column align-items-center">
      @if(isset($category))
        <h1 class="text-center page-title"><span class="thin-page-title">Kategori Karya : </span>{{ $category->name }}</h1>  
      @else
        <h1 class="text-center page-title">Semua Karya Seni</h1>
      @endif
      <span class="underline-page-title text-center"></span>
    </div>
    <div class="row my-4 justify-content-center">
      <div class="col-lg-10">

        <div class="row" >
          @foreach ($artworks as $artwork)
          <div class="col-md-4 my-4">

            @include('components._artwork-card')

          </div>
          @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
          {{ $artworks->links() }}
        </div>

      </div>
    </div>
  </div>
</x-app-layout>