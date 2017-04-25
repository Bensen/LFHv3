<div class="modal fade" id="kickMemberModal" tabindex="-1" role="dialog" aria-labelledby="kickMemberLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="kickMemberLabel">Wie heißt der Kämpfer?</h3>
                <button class="btn btn-danger btn-sm m-0 float-right" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('team.kick', $team->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="name">Name</label>
                        <input id="name" class="form-control{{ $errors->has('name') ? ' form-control-danger' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <button class="btn btn-warning" type="submit">Rauswerfen</button>
                    <button class="btn" type="button" data-dismiss="modal">Abbrechen</button>
                </form>
            </div>
        </div>
    </div>
</div>