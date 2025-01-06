<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use App\Models\Post;
use App\Services\ReputationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    protected $reputationService;

    public function __construct(ReputationService $reputationService)
    {
        $this->reputationService = $reputationService;
    }

    public function vote(Request $request, Post $post)
    {
        $vote = Vote::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'post_id' => $post->id
            ],
            ['vote_type' => $request->vote_type]
        );

        $this->reputationService->calculatePoints($post->user);

        return response()->json(['message' => 'Vote recorded']);
    }
}