<?php namespace App\Services\Serp;

use App\Exceptions\WebException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SerpResultsApiService
{
    protected static $url;
    protected static $token;

    /**
     * @param $keyword
     * @return mixed
     * @throws WebException
     */
    public static function get_serp_results($keyword)
    {
        return self::send_api_request($keyword);
    }

    /**
     * @param $keyword
     * @return mixed
     * @throws WebException
     */
    protected static function send_api_request($keyword)
    {
        self::$url = env('SERP_API_URL') . '/check-keyword';
        self::$token = env('SERP_API_TOKEN');
        if (!self::$url || !self::$token) {
            throw new WebException('Please set url and token');
        }
        return self::get_api_data([
            'form_params' => [
                'q' => $keyword,
                'token' => self::$token
            ]
        ]);
    }

    /**
     * Get data from API
     *
     * @param array $data request params
     * @param null $url if url other than default
     * @param string $method method (POST, GET, DELETE)
     * @return mixed
     * @throws WebException
     */
    protected static function get_api_data($data, $url = null, $method = 'POST')
    {
        $client = new Client([
            'base_uri' => $url ? self::$url . $url : self::$url
        ]);
        try {
            $res = $client->request($method, '', $data);
            if ($res->getStatusCode() !== 200) {
                throw new WebException($res->getBody());
            };
        } catch (GuzzleException $e) {
            throw new WebException($e->getMessage());
        }
        $body = $res->getBody();
        $body = json_decode($body);
        return $body;
    }
}
