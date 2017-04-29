<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Game\Level;

class Character extends Model
{
    protected $table = 'characters';

    protected $fillable = ['name', 'fighter'];

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

    public function experience()
    {
        return Level::experience($this);
    }
}
