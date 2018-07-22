<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class HasSidoMencionado extends Notification
{
    use Queueable;

    /**
     * @var \App\Reply
     */
    protected $reply;

    /**
     * Create a new notification instance.
     *
     * @param \App\Reply $reply
     */
    public function __construct($reply)
    {
        $this->reply = $reply;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->reply->owner->name . ' te ha mencionado en un comentario .',
            'link' => '/forum' . '/' . $this->reply->thread->canal->slug . '/' . $this->reply->thread->id 
        ];
    }
}
