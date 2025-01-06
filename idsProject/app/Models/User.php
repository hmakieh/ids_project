<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'role_id',
        'username',
        'email',
        'password',
        'profile_picture',
        'reputation_points'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'user_achievements')
            ->withPivot('achieved_at')
            ->withTimestamps();
    }

    public function reputationLogs()
    {
        return $this->hasMany(ReputationLog::class);
    }

    public function receivedUpvotes()
    {
        return $this->hasManyThrough(Vote::class, Post::class)
            ->where('vote_type', 'Upvote');
    }

    public function receivedDownvotes()
    {
        return $this->hasManyThrough(Vote::class, Post::class)
            ->where('vote_type', 'Downvote');
    }
}
