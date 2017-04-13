<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    private $maxCharacters = 3;

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function characters()
    {
        return $this->hasMany(Character::class);
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
