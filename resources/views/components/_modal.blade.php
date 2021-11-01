<div class="modal fade" id="{{ $name }}" tabindex="-1" aria-hidden="true">

  <div class="modal-dialog modal-lg rounded-3">
    <div class="modal-content">

      <div class="modal-body">

        <button type="button" class="close-button" data-bs-dismiss="modal">
          <i class="fas fa-times-circle"></i>
        </button>
        
        {{ $slot }}

      </div>

    </div>
  </div>

</div>