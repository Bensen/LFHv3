<div class="progress">
    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $character->experience() }}%;" aria-valuenow="{{ $character->experience() }}" aria-valuemin="0" aria-valuemax="100">{{ $character->experience() }}%</div>
</div>
<div class="progress">
    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{ $character->health }}/{{ $character->health }}</div>
</div>
