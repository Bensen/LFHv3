<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'team_id', 'role', 'name', 'fighter', 'image', 'level', 'experience', 'fame', 'health', 'maxHealth', 'primary', 'secondary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public static function check()
    {
        return session()->has('character');
    }

    public function hasTeam()
    {
        return (isset($this->team_id) && $this->role != 'Applicant') ? true : false ;
    }

    public function hasRole($role)
    {
        return ($this->role == $role) ? true : false ;
    }
}
