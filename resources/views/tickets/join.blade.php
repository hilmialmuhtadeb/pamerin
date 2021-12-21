<x-app-layout title="Pameran">

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
      <h1 class="text-center page-title">Pameran</h1>
      <span class="underline-page-title text-center"></span>
    </div>
        
    <div class="row justify-content-center">
      <div class="text-center mt-4">
    <iframe src="https://i.simmer.io/@denysgamers46/virtualkarya" style="width:960px;height:600px;border:0"></iframe>
    </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-6">
        <p>Mahera Lim, Sumatera Utara</p>
      </div>
      <div class="col-3 justify-content-beetwen">
         <button type="submit"><i class="fa fa-thumbs-up"></i></button>
         <button type="submit"><i class="fa fa-thumbs-down"></i></button>
      </div>
    </div>

  </div>
  
</x-app-layout>