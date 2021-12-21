<x-app-layout title="Home Page">

  @slot('style')
    <style>
      .home-card {
        background-color: #FEEFD6;
        border-radius: 10px;
      }
      .home-card-title, .section-title {
        font-size: 28px;
        font-weight: 500;
      }
      .home-card-subtitle {
        font-size: 15px;
        font-weight: 400;
        padding: 20px 0;
      }
      .home-card-button {
        background-color: #F6AE2D;
        text-decoration: none;
        padding: 10px 45px;
        font-size: 12px;
        font-weight: 700;
      }
      .artikel-link {
        text-align: end;
        text-decoration: none;
        font-size: 13px;
        font-weight: 400;
      }
      .login-artist {
        font-size: 19px;
      }
      .login-artist-button {
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        background-color: #FF7171;
        color: white;
        padding: 5px 20px;
        transition: .2s;
      }
      .login-artist-button:hover {
        background-color: #da5252;
        color: white;
      }
    </style>
  @endslot

  <div class="container">

    @guest
        <div class="row text-center pb-4">
          <p class="login-artist"><b>Anda adalah seorang seniman?</b> Buat pameranmu sekarang juga! <a href="{{ route('artists.login') }}" class="login-artist-button mx-2 rounded-pill">Masuk Seniman</a></p>
        </div>
    @endguest

    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="row home-card shadow">
          <div class="col-md-5">
            <img src="{{asset('/img/ilustrasi/ilustrasi1.png')}}">
          </div>
          <div class="col-md-7 px-5 d-flex flex-column justify-content-center">
            <h1 class="home-card-title">Mulai suntuk dan bosan saat pandemi seperti ini?</h1>
            <p class="home-card-subtitle">Booking tiket pameranmu sekarang juga!</p>
            <div>
              <a class="home-card-button rounded-pill text-white" href="#">Pesan Sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section id="pameran-terbaru" class="py-5">
      <h1 class="section-title text-center py-4">Pameran Terbaru</h1>
      <div class="row">
       
        @foreach ($exhibitions as $exhibition)
        <div class="col-md-4">
          @include('components._exhibition-card')
        </div>
        @endforeach
        
      </div>
    </section>

    <section id="artikel" class="py-5 mb-5">
      <h1 class="section-title text-center py-2">Artikel</h1>
      <a href="{{ route('articles.index') }}" class="artikel-link d-block my-3 text-navy">Lihat Selengkapnya</a>
      <div class="row">
       
        @foreach ($articles as $article)
        <div class="col-md-4">
          @include('components._article-card')
        </div>
        @endforeach
        
      </div>
    </section>
    
  </div>
  
</x-app-layout>