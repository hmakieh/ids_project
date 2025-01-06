<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['name', 'description', 'badge_image', 'required_points'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_achievements')
            ->withPivot('achieved_at')
            ->withTimestamps();
    }
}