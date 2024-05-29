<?php

namespace App\Mail\Course;

use App\Models\CourseLiveRegister;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LiveRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public CourseLiveRegister $courseLiveRegister;
    public mixed $courseLive;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CourseLiveRegister $courseLiveRegister)
    {
        $this->courseLiveRegister = $courseLiveRegister;
        $this->courseLive = $courseLiveRegister->course_live;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Recordatorio de sesión de clase' . $this->courseLive->title,
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
            view: 'mail.course.live_registered',
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
