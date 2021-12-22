<x-app-layout title="Login Admin PamerIn">
    @slot('style')
        <style>
          body, html {
            height: 100%;
            background-image: linear-gradient(to left, #FF7171, #F6AE2D);
            background-size: cover;
          }
          .navbar, footer {
            display: none;
          }
          .wrapper {
            background-color: white;
            margin: 100px 0;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 2px rgba(255, 255, 255, 0.253);
          }
          form {
            width: 80%;
          }
          .login-title {
            font-size: 16px;
          }
          .login-button {
            background-color: #F6AE2D;
            color: white;
            border: 0;
            padding: 8px 0;
          }
          label, input[type=email], input[type=password], .login-button {
            font-size: .8em;
            font-weight: 600;
          }
          input {
            background-color: #F2F2F2 !important;
          }
          .bottom-link {
            font-size: 12px;
            color: #B6B6B6;
            text-decoration: none;
            transition: .3s;
            margin: 80px 0 20px;
          }
          .bottom-link:hover {
            color: #5f5f5f;
          }
          .error-message {
            color: red;
            font-size: 12px;
          }
        </style>
    @endslot
  
    <div class="container">
  
      <div class="row justify-content-center">
        <div class="col-sm-8">
  
          <div class="row wrapper">
  
            <div class="col-6">
              <a href="{{ route('home') }}">
                <img src="{{asset('/img/logo/pamerin-icon.png')}}" class="img-fluid py-5 px-3">
              </a>
            </div>
  
            <div class="col-6 d-flex flex-column justify-content-end align-items-center">
              <p class="login-title mb-4">Masuk sebagai Admin</p>
              <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                  <input type="email" name="email" value="{{ old("email") }}" class="form-control rounded-pill" id="email" placeholder="Email">
                  @error('email')
                      <span class="error-message">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="password" name="password" class="form-control rounded-pill" id="password" placeholder="Kata Sandi">
                  @error('password')
                      <span class="error-message">{{ $message }}</span>
                  @enderror
                </div>
                <div class="d-grid">
                  <button type="submit" class="rounded-pill login-button text-center">
                    Masuk
                  </button>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="" class="bottom-link"></a>
                </div>
              </form>
            </div>
  
          </div>
          
        </div>
      </div>
  
    </div>
    
  </x-app-layout>