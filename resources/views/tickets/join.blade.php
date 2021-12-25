<x-app-layout title="Pameran Anda">

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
      <h1 class="text-center page-title">Pameran berlangsung</h1>
      <span class="underline-page-title text-center"></span>
    </div>
        
    <div class="row justify-content-center">
      <div class="text-center mt-4">
    <iframe src="https://i.simmer.io/@denysgamers46/virtualkarya" style="width:960px;height:600px;border:0"></iframe>
    </div>
    
    <div class="row justify-content-center align-items-center">
      <div class="col-sm-4 d-grid my-4 justify-content-end">
        <form action="{{ route('web.add-like',$exhibition->id) }}" method="get">
          <input type="hidden" name="exhibition_id" value="{{ $exhibition->id }}">
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <button type="submit"><i class="fa fa-thumbs-up"></i></button>
        </form>
      </div>
      <div class="col-sm-4 d-grid my-4">
        <form action="{{ route('web.min-like',$exhibition->id) }}" method="get">
          <input type="hidden" name="exhibition_id" value="{{ $exhibition->id }}">
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <button type="submit"><i class="fa fa-thumbs-down"></i></button>
        </form>
      </div>
      <div class="col-sm-4 d-grid my-4">
        Jumlah like {{ $jumlah_like->count() }}
      </div>
    </div>

  </div>
  
</x-app-layout>