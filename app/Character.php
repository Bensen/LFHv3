<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name', 'fighter', 'image', 'level', 'experience', 'fame', 'health', 'primary', 'secondary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
