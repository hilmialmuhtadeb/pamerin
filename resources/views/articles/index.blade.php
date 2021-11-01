<x-app-layout title="Semua Artikel">

  @slot('style')
      <style>

      </style>
  @endslot

  <div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center">
      <h1 class="text-center page-title">Artikel</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <div class="row my-4 justify-content-center">
      <div class="col-lg-10">

        <div class="row">
          @foreach ($articles as $article)
          <div class="col-md-4 my-4">

            @include('components._article-card')

          </div>
          @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
          {{ $articles->links() }}
        </div>

      </div>
    </div>
  </div>
  
</x-app-layout>