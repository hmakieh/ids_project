<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Comment;
use App\Notifications\PostCommented;
use App\Notifications\PostUpvoted;

class NotificationService
{
    public function notifyPostOwner(Post $post, string $type, Comment $comment = null)
    {
        switch ($type) {
            case 'commented':
                if ($comment) {
                    $post->user->notify(new PostCommented($comment));
                } else {
                    // Handle error or fallback if no comment is provided but it is required
                    // Log error or handle it accordingly
                }
                break;
            case 'upvoted':
                $post->user->notify(new PostUpvoted($post));
                break;
        }
    }
}