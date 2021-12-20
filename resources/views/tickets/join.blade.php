<x-app-layout title="coba">

  @slot('style')
      <style>
        p {
          font-size: 13px;
          font-weight: 400;
        }
      </style>
  @endslot

  <div class="container">
  @foreach($user->exhibition as $tiket)
    <div class="d-flex justify-content-center flex-column align-items-center">
      <h1 class="text-center page-title">{{$tiket->name}}</h1>
      <span class="underline-page-title text-center"></span>
    </div>
        
    <div class="row justify-content-center">
      <div class="text-center mt-4">
    <iframe src="https://i.simmer.io/@denysgamers46/virtualkarya" style="width:960px;height:600px;border:0"></iframe>
    </div>
    </div>
    <div class="row">
      <div class="col-6">
      </div>
      <div class="col-6">
         
      </div>
    </div>
    @endforeach
  </div>
  
</x-app-layout>