@if (session('alert'))
    <div class="alert alert-{{ session('alert')['type'] }} mb-4 alert-dismissible d-flex align-items-center"
        role="alert">
        <div>
            {{ session('alert')['message'] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
