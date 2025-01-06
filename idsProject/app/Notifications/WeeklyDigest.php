<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WeeklyDigest extends Notification
{
    private $topPosts;

    public function __construct($topPosts)
    {
        $this->topPosts = $topPosts;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Weekly Community Digest')
            ->markdown('emails.weekly-digest', [
                'user' => $notifiable,
                'topPosts' => $this->topPosts
            ]);
    }

    public function toArray($notifiable)
    {
        return [
            'top_posts' => $this->topPosts
        ];
    }
}

