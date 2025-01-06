<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use App\Models\Comment;

class PostCommented extends Notification
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function toArray($notifiable)
    {
        return [
            'post_id' => $this->comment->post_id,
            'comment_id' => $this->comment->id,
            'commenter_id' => $this->comment->user_id,
            'comment_content' => $this->comment->content
        ];
    }
}
