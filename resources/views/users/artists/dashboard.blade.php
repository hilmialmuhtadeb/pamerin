<x-app-layout title="Dashboard">

  @slot('style')
      <style>
        .box-container {
          width: 60%;
          margin-bottom:180px;
        }
        .box {
          width: 30%;
          padding: .5em;
          color: white;
          text-align: center;
        }
        .count {
          font-size: 4em;
          font-weight: 800;
        }
        p {
          margin: 0;
          padding: 0;
        }
        .count-title {
          font-size: 1.5em;
          font-weight: 800;
          padding-bottom: .2em;
        }

        @media screen and (max-width: 768px) {
          .box-container {
            width: 90%;
          }
        }
      </style>
  @endslot

  <div class="container">

    <div class="d-flex justify-content-center flex-column align-items-center mb-5">
      <h1 class="text-center page-title"><span class="thin-page-title">Hai, </span>{{ Auth::user()->name }}</h1>  
      <span class="underline-page-title text-center"></span>
    </div>

    <div class="d-flex box-container justify-content-between mx-auto">     

        <div class="box exhibition bg-orange">
          <p class="count">{{ $exhibitions }}</p>
          <p class="count-title">Pameran</p>
        </div>
        <div class="box exhibition bg-guava">
          <p class="count">{{ $artworks }}</p>
          <p class="count-title">Karya Seni</p>
        </div>
        <div class="box exhibition bg-navy">
          <p class="count">{{ $auctions }}</p>
          <p class="count-title">Lelang</p>
        </div>

    </div>

  </div>
  
</x-app-layout>