<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserPreferencesRequest;

class UserProfileController extends Controller
{
    public function dashboard(User $user)
    {
        return response()->json([
            'user' => new UserResource($user),
            'posts' => $user->posts()->latest()->take(5)->get(),
            'reputation' => [
                'total_points' => $user->reputation_points,
                'achievements' => $user->achievements
            ]
        ]);
    }

    public function updatePreferences(UserPreferencesRequest $request, User $user)
    {
        $user->preferences()->update($request->validated());
        return response()->json(['message' => 'Preferences updated']);
    }
}