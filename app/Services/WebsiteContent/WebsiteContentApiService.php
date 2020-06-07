<?php namespace App\Services\WebsiteContent;

use App\Exceptions\WebException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use function GuzzleHttp\Psr7\stream_for;

class WebsiteContentApiService
{
    protected static $url;
    protected static $token;

    /**
     * @param $url
     * @return mixed
     * @throws WebException
     */
    public static function get_website_content($url)
    {
        return self::send_api_request([
            'url' => $url
        ]);
    }

    /**
     * @param $page_html
     * @return mixed
     * @throws WebException
     */
    public static function render_website_content($page_html)
    {
        return self::send_api_request([
            'html_content' => $page_html
        ], '/render-website');
    }

    /**
     * @param $page_html
     * @return mixed
     * @throws WebException
     */
    public static function download_website_pdf($filename)
    {
        return self::send_download_request($filename);
    }

    /**
     * @param $keyword
     * @return mixed
     * @throws WebException
     */
    protected static function send_download_request($filename, $path = '/download-website')
    {
        self::$url = env('SERP_API_URL') . $path;
        self::$token = env('SERP_API_TOKEN');
        if (!self::$url || !self::$token) {
            throw new WebException('Please set url and token');
        }
        $resource = fopen(storage_path('test.pdf'), 'w');

        return self::get_api_data([
            'query' => [
                'filename' => $filename,
                'token' => self::$token
            ],
            'sink' => $resource
        ], null, 'GET');
    }

    /**
     * @param $keyword
     * @return mixed
     * @throws WebException
     */
    protected static function send_api_request($data, $path = '/check-website')
    {
        self::$url = env('SERP_API_URL') . $path;
        self::$token = env('SERP_API_TOKEN');
        if (!self::$url || !self::$token) {
            throw new WebException('Please set url and token');
        }
        return json_decode(self::get_api_data([
            'form_params' => array_merge($data, [
                'token' => self::$token
            ])
        ]));
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
        return $body;
    }
}
