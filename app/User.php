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

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    private $maxCharacters = 3;

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function hasRemainingCharacters()
    {
        return ($this->characters()->count() < $this->maxCharacters) ? true : false ;
    }

    public function getMaxCharacters()
    {
        return $this->maxCharacters;
    }
}
