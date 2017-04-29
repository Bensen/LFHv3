<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['name', 'emblem', 'color'];

    private $maxMembers = 50;

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function getMaxMembers()
    {
        return $this->maxMembers;
    }
}
