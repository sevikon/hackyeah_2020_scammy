<?php

namespace App\Mail;

use App;
use App\Models\User;

class SingleNotificationEmail extends SecureMail
{
    /**
     * @var User $user
     */
    protected $user;
    protected $language;
    protected $notification;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $language
     * @param $notification
     */
    public function __construct($user, $language, $notification)
    {
        $this->user = $user;
        $this->language = $language;
        $this->notification = $notification;
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
        $subject = trans('messages.email_notification_single_subject');

        $user = $this->user;

        $data = [
            'name' => $user->full_name,
            'link' => $this->get_app_url(),
            'subject' => $subject,
            'notification' => $this->notification
        ];

        $data = $this->secure_array($data, ['name']);

        return $this->view('emails.notification_single', $data)
            ->text('emails.notification_single_text', $data)
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }
}
