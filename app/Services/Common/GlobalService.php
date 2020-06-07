<?php

namespace App\Services\Common;

use App\Exceptions\WebException;
use Carbon\Carbon;
use DOMDocument;
use DOMNode;
use Exception;
use Request;

/**
 * Class GlobalService
 * @package App\Services
 */
class GlobalService
{

    /**
     * Get boolean value for input
     *
     * @param $variable
     * @return mixed
     */
    public static function get_boolean_value($variable)
    {
        return filter_var($variable, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @param $data
     * @return string
     */
    public static function secure_data($data)
    {

        return trim(preg_replace('/ +/', ' ', urldecode(html_entity_decode(strip_tags($data)))));
    }

    public static function check_crypto_currency($currency)
    {
        $currency = $currency ? $currency : '';
        return in_array(strtoupper($currency), ['BTC', 'ETH']);
    }

    /**
     * @return array|string
     */
    public static function get_event_local_code()
    {
        return Request::header('LocalCode');
    }

    public static function get_diff_in_seconds($start, $end)
    {
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);
        return $end->diffInSeconds($start);
    }

    public static function get_duration_from_seconds($seconds, $simple = false)
    {
        return self::format_duration($seconds, $simple);
    }

    public static function get_duration($start, $end, $simple = false)
    {
        return self::format_duration(self::get_diff_in_seconds($start, $end), $simple);
    }

    protected static function format_duration($seconds, $simple = false)
    {
        return floor($seconds / 3600) . gmdate($simple ? ":i" : ":i:s", $seconds % 3600);
    }

    public static function fix_multiple($string)
    {
        $string = strtolower(trim($string));
        $string = preg_replace("/[^A-Za-z0-9 ]/", ';', $string);
        $string = explode(";", $string);
        return ucwords($string[0]);
    }

    public static function repair_double($string)
    {
        $string = explode('-', $string)[0];
        $string = explode('/', $string)[0];

        $thousand = stripos($string, 'k') !== false;
        $million = stripos($string, 'm') !== false;

        $string = preg_replace("/[^0-9.,]/", "", $string);

        //fix semicolon like: 250,00;  360,50
        if (is_string($string)) {
            $end = substr($string, -3);
            if ($end && $end[0] === ',') {
                $string = substr($string, 0, strlen($string) - 3) . '.' . substr($end, 1);
            }
        }

        $string = preg_replace("/[^0-9.]/", "", $string);
        $string = floatval($string);

        if ($thousand) {
            $string = $string * 1000;
        } else if ($million) {
            $string = $string * 1000000;
        }

        return $string;
    }

    /**
     * Unset all fields which are in properties array
     *
     * @param array $arr
     * @param array $properties
     * @return array
     */
    public static function unset_null_properties($arr, $properties = [])
    {
        if (!$arr) {
            return [];
        }
        foreach ($arr as $key => $value) {
            if (is_null($value) && in_array($key, $properties)) {
                unset($arr[$key]);
            }
        }
        return $arr;
    }

    /**
     * @param $html
     * @return string
     */
    public static function make_html_safe($html)
    {
        if (!$html || !is_string($html)) {
            return '';
        }
        /** @noinspection HtmlRequiredAltAttribute */
        $allowed_tags = '<br><strong><bold><b><i><ol><li><ul><a><img><video><h1><code><h2><h3><h4><h5><h6><p><blockquote><u><del><span><iframe>';
        $html = strip_tags($html, $allowed_tags);
        $html = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $html);

        $dom = new DOMDocument();
        $dom->loadHTML('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . $html);
        $script = $dom->getElementsByTagName('script');
        $remove = [];
        foreach ($script as $item) {
            $remove[] = $item;
        }
        $iframes = $dom->getElementsByTagName('iframe');
        /** @var DOMNode $iframe */
        foreach ($iframes as $iframe) {
            if (!self::validate_iframe($iframe->getAttribute('src'))) {
                $remove[] = $iframe;
            }
        }
        foreach ($remove as $item) {
            $item->parentNode->removeChild($item);
        }
        $images = $dom->getElementsByTagName('img');

        //change relative images to absolute version
        /** @var DOMNode $image */
        foreach ($images as $image) {
            $src = self::get_fixed_url($image->getAttribute('src'));
            $image->setAttribute('src', $src);
        }
        $body = $dom->getElementsByTagName('body');
        if ($body) {
            $html = $dom->saveHTML($body->item(0));
        } else {
            $html = $dom->saveHTML();
        }
        return strip_tags($html, $allowed_tags);
    }

    /**
     * @param $url
     * @return string
     */
    protected static function get_fixed_url($url)
    {
        $src = $url;
        $attachment_id = null;
        if (!self::is_absolute($url)) {
            $src = env('APP_URL') . $url;
        }
        return $src;
    }

    /**
     * @param $url
     * @return false|int
     */
    protected static function is_absolute($url)
    {
        return preg_match('/^https?:\/\/(.*)/', $url);
    }

    /**
     * @param $src
     * @return bool
     */
    protected static function validate_iframe($src)
    {
        $correct = false;
        foreach (['https://player.vimeo.com/video/', '//player.vimeo.com/video/', 'https://www.youtube.com/embed/', '//www.youtube.com/embed/'] as $w) {
            if (self::starts_with($src, $w)) {
                $correct = true;
                break;
            }
        }
        return $correct;
    }

    /**
     * @param $date
     * @param $zone
     * @return string
     * @throws WebException
     */
    public static function get_date_utc($date, $zone)
    {
        try {
            return Carbon::parse($date, $zone)->tz('UTC')->toDateTimeString();
        } catch (Exception $e) {
            throw new WebException('Wrong Date Format');
        }
    }

    /**
     * @return string
     */
    public static function get_current_utc_time()
    {
        return Carbon::now()->second(0)->tz('UTC')->toDateTimeString();
    }

    /**
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public static function starts_with($haystack, $needle)
    {
        return substr_compare($haystack, $needle, 0, strlen($needle)) === 0;
    }

    /**
     * @param $date
     * @return string
     */
    public static function get_campaign_from_date($date)
    {
        return Carbon::parse($date)->format('Y-m');
    }

    /**
     * @param $fields
     * @return string
     */
    public static function get_group_query($fields)
    {
        $fields_sum = '';
        if (is_array($fields)) {
            foreach ($fields as $field) {
                $fields_sum .= ',sum(' . $field . ') as sum_' . $field;
            }
        } else {
            $fields_sum = ',sum(' . $fields . ') as sum_' . $fields;
        }
        return $fields_sum;
    }
}
