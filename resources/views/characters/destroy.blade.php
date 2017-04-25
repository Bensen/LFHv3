<div class="modal fade" id="deleteCharacterModal{{ $character->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteCharacterModal{{ $character->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="deleteCharacterModal{{ $character->id }}Label">Charakter <strong>"{{ $character->name }}"</strong> löschen?</h3>
                <button class="btn btn-danger btn-sm m-0 float-right" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="float-right" method="POST" action="{{ route('character.destroy', $character->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn" type="button" data-dismiss="modal">Abbrechen</button>
                    <button class="btn btn-danger" type="submit">Löschen</button>
                </form>
            </div>
        </div>
    </div>
</div>