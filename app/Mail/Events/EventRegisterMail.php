<?php

namespace App\Mail\Events;

use App\Models\ActivityRegister;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    private ActivityRegister $activityRegister;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ActivityRegister $activityRegister)
    {
        $this->activityRegister = $activityRegister;
        $this->user = $activityRegister->user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: '¡Bienvenidos! Confirmación de registro para ' . $this->activityRegister->activity->name,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.events.register',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
