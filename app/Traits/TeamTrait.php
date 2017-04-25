<?php

namespace App\Traits;

use App\Team;
use App\Character;

trait TeamTrait
{
    public function updateFame($team, $characters)
    {
        $team->fame = ($characters->sum('fame') / 10);
        $team->save();
    }

    /**
     * Dismiss all Members of a Team.
     * 
     * @return void
     */
    public function dismissMembers(Team $team)
    {
        foreach ($team->characters as $character) {
            $character->team()->dissociate($team);
            $character->role = 'None';
            $character->save();
        }
    }
}
