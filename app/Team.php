<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'fame',];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
