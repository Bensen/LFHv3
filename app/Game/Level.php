<?php

namespace App\Game;
use App\Character;

class Level
{
    public static function experience(Character $character)
    {
        return round(($character->experience * 100) / static::neededExperience($character->level), 0, PHP_ROUND_HALF_DOWN);
    }

    public static function up(Character $character)
    {
        $neededExperience = static::neededExperience($character->level);
        if ($character->experience >= $neededExperience) {
            $character->level++;
            $character->experience = $character->experience - $neededExperience;
            $character->save();
        }
    }

    public static function neededExperience($level)
    {
        return $level * 100;
    }
}