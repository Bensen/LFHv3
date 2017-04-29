<div class="col-md-3">
    <div class="card">
        <h3 class="card-header {{ $character->fighter }}">{{ $character->name }}</h3>
        <div class="card-block">
            <img src="{{ $character->image }}">
            @include('characters.partials.bars')
        </div>
    </div>
</div>