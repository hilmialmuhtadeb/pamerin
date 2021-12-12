<x-app-layout title="Semua Lelang">
  
  <div class="container">
    <div class="d-flex justify-content-center flex-column align-items-center">
      <h1 class="text-center page-title">Semua Lelang</h1>
      <span class="underline-page-title text-center"></span>
    </div>
    <div class="row my-4 justify-content-center">
      <div class="col-lg-10">

        <div class="row">
          @foreach ($auctions as $auction)
          <div class="col-md-4 my-4">

            @include('components._auction')

          </div>
          @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
          {{ $auctions->links() }}
        </div>

      </div>
    </div>
  </div>
</x-app-layout>