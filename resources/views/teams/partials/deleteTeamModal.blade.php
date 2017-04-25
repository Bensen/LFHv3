<div class="modal fade" id="deleteTeamModal" tabindex="-1" role="dialog" aria-labelledby="deleteTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="deleteTeamModalLabel">Team <strong>"{{ $team->name }}"</strong> auflösen?</h3>
                <button class="btn btn-danger btn-sm m-0 float-right" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="float-right" method="POST" action="{{ route('team.destroy', $team->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn" type="button" data-dismiss="modal">Abbrechen</button>
                    <button class="btn btn-danger" type="submit">Auflösen</button>
                </form>
            </div>
        </div>
    </div>
</div>