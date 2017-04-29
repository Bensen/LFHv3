@if (session('status'))
    <span class="alert alert-warning" role="alert">
        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ session('status') }}
    </span>
@endif