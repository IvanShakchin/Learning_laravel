<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Headers;

class Hello extends Mailable
{
    use Queueable, SerializesModels;

    //инициализируем переменную имени
    public $name;

    /**
     * Create a new message instance.
     */
    public function __construct($name)
    {
       $this->name = $name;
    }

    /**
     * Достань конверт с сообщением.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Тема письма',
        );
    }

    /**
     * Получите определение содержимого сообщения.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.hello',
            text: 'emails.hello_text',
            with: [
                'a' => 1978,
            ],
        );
    }

    /**
     * Получить заголовки сообщения.
     */
    public function headers(): Headers
    {
        return new Headers(
            messageId: 'custom-message-id@example.com',
            references: ['previous-message@example.com'],
            text: [
                'X-Custom-Header' => 'Custom Value',
            ],
        );
    }


    /**
     * Получите вложения к сообщению.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
