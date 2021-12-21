<x-app-layout title="Portofolio">

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
        <h1 class="text-center page-title">{{ Auth::user()->name }}</h1>
        <span class="underline-page-title text-center"></span>
      </div>
  
      <div class="row justify-content-center">
        <div class="col-md-5 text-center mt-4">
          <img src="{{asset('Auth::user()->thumbnail') }}">
        </div>
      </div>
      
    </div>
    <div class="row my-4 justify-content-center">
        <div class="col-lg-10">
  
          <div class="row">
            @foreach ($artworks as $artwork)
            <div class="col-md-4 my-4">
  
              @include('components._artwork-card')
  
            </div>
            @endforeach
          </div>
  
          <div class="d-flex justify-content-center mt-4">
            {{-- {{ $artworks->links() }} --}}
          </div>
  
        </div>
  
      </div>
    
  </x-app-layout>