<?php

namespace App\Mail;

use App\Services\Common\AdminConfigService;
use App\Services\Common\GlobalService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SecureMail extends Mailable
{
    use Queueable, SerializesModels;

    protected function secure_array($data = [], $fields = [])
    {
        foreach ($fields as $field) {
            $data[$field] = isset($data[$field]) ? $this->secure($data[$field]) : null;
        }
        return $data;
    }

    protected function secure($name)
    {
        return GlobalService::secure_data($name);
    }

    protected function get_address_email()
    {
        return AdminConfigService::get_config('MAIL_FROM_ADDRESS');
    }

    protected function get_address_name()
    {
        return AdminConfigService::get_config('MAIL_FROM_NAME');
    }

    /**
     * @return string
     */
    protected function get_app_url()
    {
        return AdminConfigService::get_config('APP_URL');
    }
}
