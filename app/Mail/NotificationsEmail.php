<?php

namespace App\Mail;

use App;
use App\Models\User;

class NotificationsEmail extends SecureMail
{
    /**
     * @var User $user
     */
    protected $user;
    protected $language;
    protected $notifications;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $language
     * @param $notifications
     */
    public function __construct($user, $language, $notifications)
    {
        $this->user = $user;
        $this->language = $language;
        $this->notifications = $notifications;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        App::setLocale($this->language);

        $address = $this->get_address_email();
        $name = $this->get_address_name();
        $subject = trans('messages.email_notifications_subject');

        $user = $this->user;

        $data = [
            'name' => $user->full_name,
            'link' => $this->get_app_url(),
            'subject' => $subject,
            'notifications' => $this->notifications
        ];

        $data = $this->secure_array($data, ['name']);

        return $this->view('emails.notifications', $data)
            ->text('emails.notifications_text', $data)
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }
}
