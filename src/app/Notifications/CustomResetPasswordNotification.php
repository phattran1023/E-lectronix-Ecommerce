<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    protected $token;
    protected $userName;

    public function __construct($token, $userName)
    {
        $this->token = $token;
        $this->userName = $userName;
    }

    public function toMail($notifiable)
    {
        $resetUrl = url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false));
        $expirationTime = now()->addMinutes(config('auth.passwords.users.expire')); // Get expiration time
        return (new MailMessage)
            ->subject('Password Reset')
            ->markdown('email.passwordReset', [
                'user' => $notifiable,
                'resetUrl' => $resetUrl,
                'userName' => $this->userName, // Pass the user's name to the template
                'expirationTime' => $expirationTime,
            ]);
    }
    /**
     * Create a new notification instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
