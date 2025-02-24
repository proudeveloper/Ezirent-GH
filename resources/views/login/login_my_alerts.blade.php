@if (!empty(session('message')))

    <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
        <i class="mdi mdi-{{ session('icon') }} me-2"></i>
        <strong>{{ session('title') }}: </strong> {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    {{--
        
        <i class="mdi mdi-bullseye-arrow me-2"></i>
        <i class="mdi mdi-grease-pencil me-2"></i>
        <i class="mdi mdi-check-all me-2"></i>
        <i class="mdi mdi-block-helper me-2"></i>
        <i class="mdi mdi-alert-outline me-2"></i>
        <i class="mdi mdi-alert-circle-outline me-2"></i>
        
        
        
        <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
        <strong>{{ session('title') }}</strong> {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
    </div>  --}}
    
@endif