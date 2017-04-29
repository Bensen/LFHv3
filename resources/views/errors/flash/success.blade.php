@if (session('status'))
    <span class="alert alert-success" role="alert">
        <i class="fa fa-check-circle" aria-hidden="true"></i> {{ session('status') }}
    </span>
@endif