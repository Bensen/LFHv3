<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'character',
        'level',
        'experience',
        'health',
        'primary',
        'secondary',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
