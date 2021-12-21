<x-app-layout title="{{ $article->title }}">

  @slot('style')
      <style>
        p {
          font-size: 13px;
          font-weight: 400;
        }
      </style>
  @endslot

  <div class="container">

    <div class="d-flex justify-content-center flex-column align-items-center">
      <h1 class="text-center page-title">{{ $article->title }}</h1>
      <span class="underline-page-title text-center"></span>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-5 text-center mt-4">
        <img src="{{asset('$article->thumbnail') }}">
      </div>
    </div>
    <div class="row justify-content-center my-5">
      <div class="col-md-10">
        <p>{!! nl2br($article->text) !!}</p>
      </div>
    </div>
    
  </div>
  
</x-app-layout>