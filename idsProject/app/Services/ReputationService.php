<?php

namespace App\Services;

use App\Models\User;

class ReputationService
{
    const POINTS_PER_UPVOTE = 10;
    const POINTS_PER_DOWNVOTE = -2;
    const POINTS_PER_POST = 5;
    const POINTS_PER_COMMENT = 2;

    public function calculatePoints(User $user)
    {
        $points = 0;

        $points += $user->posts()->count() * self::POINTS_PER_POST;
        $points += $user->comments()->count() * self::POINTS_PER_COMMENT;
        $points += $user->receivedUpvotes()->count() * self::POINTS_PER_UPVOTE;
        $points += $user->receivedDownvotes()->count() * self::POINTS_PER_DOWNVOTE;

        $user->update(['reputation_points' => $points]);

        return $points;
    }
}