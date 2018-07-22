<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class NuevoPost extends Notification
{
    protected $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
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
            'message' => 'Nuevo Post: "' . $this->post->title . '"',
            'link' => '/posts' . '/' . $this->post->id 
        ];
    }
}
