@if (session('status'))
    <span class="alert alert-danger" role="alert">
        <i class="fa fa-ban" aria-hidden="true"></i> {{ session('status') }}
    </span>
@endif