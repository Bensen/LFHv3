<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'team_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    private $maxCharacters = 3;

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function hasTeam()
    {
        return isset($this->team_id);
    }

    public function hasRemainingCharacters()
    {
        return ($this->remainingCharacters()) ? true : false ;
    }

    public function remainingCharacters()
    {
        return ($this->characters()->count() < $this->getMaxCharacters()) ? true : false ;
    }

    public function getMaxCharacters()
    {
        return $this->maxCharacters;
    }
}
