<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    @if(!Auth::user() || Auth::user()->type === 3)
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{asset('/img/logo/pamerin-logo.png')}}">
    </a>
    @elseif(Auth::user()->type === 2)
    <a class="navbar-brand" href="{{ route('artists.index') }}">
        <img src="{{asset('/img/logo/pamerin-logo.png')}}">
    </a>
    @elseif(Auth::user()->type === 1)
    <a class="navbar-brand" href="{{ route('admin.index') }}">
        <img src="{{asset('/img/logo/pamerin-logo.png')}}">
    </a>
    @endif

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      {{-- left navbar --}}
      <div class="collapse navbar-collapse" id="navbarNav">
          @guest
          <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                  <a class="nav-link{{ request()->is('login') ? ' active' : '' }}"
                      href="{{ route('login') }}">Masuk</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link{{ request()->is('registration') ? ' active' : '' }}"
                      href="{{ route('register') }}">Daftar</a>
              </li>
          </ul>
          @else
          @if (Auth::user()->type === 3)
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ str_contains(request()->path(), 'exhibitions') ? ' active' : '' }}"
                    href="{{ route('exhibitions.index') }}">Pameran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ str_contains(request()->path(), 'artworks') ? ' active' : '' }}"
                    href="{{ route('artworks.index') }}">Karya</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ str_contains(request()->path(), 'auctions') ? ' active' : '' }}"
                    href="{{ route('auctions.index') }}">Lelang</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link{{ str_contains(request()->path(), 'carts') ? ' active' : '' }}"
                    href="{{ route('carts.show', Auth::user()->cart) }}"><i class="fas fa-shopping-cart me-1"></i>
                    Keranjang
                    @if (Auth::user()->cart->detailsCount)
                    <span class="badge rounded-pill bg-danger">{{ Auth::user()->cart->detailsCount }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item drop">
                <a class="nav-link" href="#"><i class="fa fa-bell me-1"></i></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">Profil</a></li>
                    <li><a class="dropdown-item" href="/tickets/show/{{auth()->user()->id}}">Tiket Saya</a></li>
                    <li><a class="dropdown-item" href="{{ route('carts.show_myorder', Auth::user()->cart) }}">Pesanan Saya</a></li>  
                    <li><a class="dropdown-item" href="{{ route('bayar_lelang.lelang', Auth::user()->cart) }}">Lelang Saya</a></li>  
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Keluar</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        @endif
          @if (Auth::user()->type === 2)
          <ul class="navbar-nav me-auto">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Kelola Pameran
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('artists.fair.pengajuan') }}">Pengajuan</a></li>
                    <li><a class="dropdown-item" href="{{ route('artists.fair.publikasi') }}">Publikasi</a></li>
                    <li><a class="dropdown-item" href="{{ route('artists.fair.berlangsung') }}">Sedang
                            Berlangsung</a></li>
                    <li><a class="dropdown-item" href="{{ route('artists.fair.selesai') }}">Selesai</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Kelola Karya Seni
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('artists.artworks') }}">Karya Seni</a></li>
                    <li><a class="dropdown-item" href="{{ route('artists.artworks.sell') }}">Dijual</a></li>
                    <li><a class="dropdown-item" href="{{ route('artists.artworks.accept') }}">Pesanan Diterima</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('artists.artworks.send') }}">Perlu Dikirim</a></li>
                    <li><a class="dropdown-item" href="{{ route('artists.artworks.finish') }}">Selesai</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Kelola Lelang
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('artists.sale.lelang') }}">Sedang Berlangsung</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('artists.sale.daftar') }}">Daftar Lelang</a></li>
                    <li><a class="dropdown-item" href="{{ route('artists.sale.terima') }}">Pesanan Diterima</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('artists.sale.kirim') }}">Perlu Dikirim</a></li>
                    <li><a class="dropdown-item" href="{{ route('artists.sale.done') }}">Selesai</a></li>
                  </ul>
              </li>
          </ul>
          <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">Profil</a></li>
                      <li><a class="dropdown-item" href="{{ route('artists.porto', Auth::user()) }}">Portofolio</a></li>
                      <li>
                          <form action="{{ route('logout') }}" method="post">
                              @csrf
                              <button type="submit" class="dropdown-item">Keluar</button>
                          </form>
                      </li>
                  </ul>
              </li>
          </ul>
          @endif
          @if (Auth::user()->type === 1)
          <ul class="navbar-nav me-auto">
              <li class="nav-item">
                  <a class="nav-link{{ str_contains(request()->path(), 'exhibitions') ? ' active' : '' }}"
                      href="{{ route('admin.pengguna') }}">Pengguna</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Kelola Pameran
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('admin.pengajuan') }}">Pengajuan</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.publikasi') }}">Publikasi</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.berlangsung') }}">Sedang Berlangsung</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.selesai') }}">Selesai</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Kelola Karya Seni
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('admin.tersedia') }}">Tersedia</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.dikirim') }}">Dikirim</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.finish') }}">Selesai</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Kelola Lelang
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('admin.sedia') }}">Tersedia</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.kirim') }}">Dikirim</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.done') }}">Selesai</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link{{ str_contains(request()->path(), 'artworks') ? ' active' : '' }}"
                      href="{{ route('admin.artikel') }}">Kelola Artikel</a>
              </li>
          </ul>
          <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li>
                          <form action="{{ route('logout') }}" method="post">
                              @csrf
                              <button type="submit" class="dropdown-item">Keluar</button>
                          </form>
                      </li>
                  </ul>
              </li>
          </ul>
          @endif
          @endguest

      </div>

    </div>
</nav>