@if (session()->has('success'))    
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="alert bg-green alert-dismissible fade show my-3" role="alert">
          <p class="alert-message m-0">{{ session('success') }}</p>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </div>
@endif

@if (session()->has('error'))    
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="alert bg-red alert-dismissible fade show my-3" role="alert">
          <p class="alert-message m-0">{{ session('error') }}</p>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </div>
@endif
