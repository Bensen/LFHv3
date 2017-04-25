<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'emblem', 'color', 'fame',
    ];

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
