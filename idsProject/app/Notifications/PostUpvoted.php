<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostUpvoted extends Notification
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function toArray($notifiable)
    {
        return [
            'post_id' => $this->post->id,
            'voter_id' => Auth::id()
        ];
    }


}