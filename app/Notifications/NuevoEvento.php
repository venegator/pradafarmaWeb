<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class NuevoEvento extends Notification
{
    protected $evento;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($evento)
    {
        $this->evento = $evento;
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
            'message' => 'Nuevo Evento: "' . $this->evento->title . '"',
            'link' => '/eventos' . '/' . $this->evento->id 
        ];
    }
}
