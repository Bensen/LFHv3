@if (session('status'))
    <span class="alert alert-info" role="alert">
        <i class="fa fa-info-circle" aria-hidden="true"></i> {{ session('status') }}
    </span>
@endif