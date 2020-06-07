<?php namespace App\Services\Common;

use Illuminate\Support\Facades\Cache;

const PRE_ADMIN_CACHE = 'ADMIN_CONFIG_VAR_';

/**
 * Class AdminConfigService
 * @package App\Services
 */
class AdminConfigService
{

    public static function get_email_team_name()
    {
        return self::get_config('MAIL_TEAM_NAME', self::get_config('MAIL_FROM_NAME', self::get_config('APP_NAME')));
    }

    public static function get_config($name, $default_value = null, $kind = 'string')
    {
        $cache_name = PRE_ADMIN_CACHE . $name;
        $cached = Cache::get($cache_name);
        if ($cached) {
            return $cached;
        }
        if ($kind === 'integer') {
            $val = intval(self::get_field_value($name, $default_value));
        } else if ($kind === 'bool') {
            $val = self::get_field_value($name, $default_value) === 'true';
        } else {
            $val = self::get_field_value($name, $default_value);
        }
        Cache::put($cache_name, $val);
        return $val;
    }

    protected static function get_field_value($name, $default_value)
    {
        return env($name, $default_value);
    }

    public static function get_app_configuration()
    {
        return [
            'pusher_app_key' => env('PUSHER_APP_KEY'),
            'pusher_app_cluster' => env('PUSHER_APP_CLUSTER'),
        ];
    }
}
