<x-app-layout title="Semua Pameran">
  
  <div class="container">
    <div class="d-flex justify-content-center flex-column align-items-center">
      <h1 class="text-center page-title">Semua Pameran</h1>
      <span class="underline-page-title text-center"></span>
    </div>
    <div class="row my-4 justify-content-center">
      <div class="col-lg-10">

        <div class="row">
          @foreach ($exhibitions as $exhibition)
          <div class="col-md-4 my-4">

            @include('components._exhibition-card')

          </div>
          @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
          {{ $exhibitions->links() }}
        </div>

      </div>
    </div>
  </div>
</x-app-layout>