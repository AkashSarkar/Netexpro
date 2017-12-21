<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class invitationAccepted extends Notification
{
    use Queueable;
    protected $employee;
    protected $value;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($employee,$value)
    {
        $this->employee=$employee;
        $this->value=$value;
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

    public function toDatabase($notifiable)
    {
        
        return [
            "employee"=>$this->employee,
            "value"=>$this->value
            
        ];
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
            //
        ];
    }
}
