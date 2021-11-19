<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class BotNotification extends Notification
{
    use Queueable;

    private $user;
    private $answer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $answer)
    {
        $this->user = $user;
        $this->answer = $answer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast', WebPushChannel::class];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => "{$this->user->name} sua questão foi respondida!",
            'body' => 'Clique aqui para ver a resposta.',
            'action_url' => route('user.answers.show', $this->answer->id),
            'created' => Carbon::now()->toIso8601String(),
        ];
    }

    /**
     * Get the web push representation of the notification.
     *
     * @param  mixed                                              $notifiable
     * @param  mixed                                              $notification
     * @return \Illuminate\Notifications\Messages\DatabaseMessage
     */
    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage())
            ->title($this->answer->question)
            ->icon($this->user->avatar)
            ->body($this->answer->answer)
            ->action('View app', 'view_app')
            ->data(['id' => $notification->id]);
    }
}
