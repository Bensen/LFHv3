<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['name', 'emblem', 'color'];

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
