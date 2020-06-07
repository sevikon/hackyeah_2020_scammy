<?php namespace App\Services\WebsiteContent;

use App\Exceptions\WebException;

class WebsiteContentService
{
    /**
     * @param $url
     * @throws WebException
     */
    public static function get_website_content($url)
    {
        return WebsiteContentApiService::get_website_content($url);
    }

    /**
     * @param $page_html
     * @throws WebException
     */
    public static function render_website_html($page_html)
    {
        return WebsiteContentApiService::render_website_content($page_html);
    }

    /**
     * @param $filename
     * @throws WebException
     */
    public static function download_website_pdf($filename)
    {
        return WebsiteContentApiService::download_website_pdf($filename);
    }
}
