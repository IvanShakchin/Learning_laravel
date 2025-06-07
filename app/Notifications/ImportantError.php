<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ImportantError extends Notification
{
    use Queueable;

    public $a;// можем передовать параметры

    /**
     * Создайте новый экземпляр уведомления.
     */
    public function __construct($a)
    {
        $this->a = $a;
    }

    /**
     * Получите каналы доставки уведомлений.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // через запятую рядом с mail можно указать еще каналы
        // для поступления уведомлений
        return ['mail'];
    }

    /**
     * Получите уведомление по почте.
     */
    public function toMail(object $notifiable): MailMessage
    {
        /*
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
        */
        // создание собственной шаблон уведомления
        // похоже на отправку email
        return (new MailMessage)->subject('Ошибка на сайте')
            ->view(
                ['emails.important_error', 'emails.important_error_text'],
                ['a'=>$this->a, 'b'=> 1001]
            );
        
        // если в базе email назван по другому например mail 
        // то нужно об этом указать
        // public function routeNotificationForMail($notification){
        //     return $this->mail;
        // }


    }

    /**
     * Получите массивное представление уведомления.
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
