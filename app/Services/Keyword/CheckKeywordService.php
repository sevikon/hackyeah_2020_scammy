<?php

namespace App\Services\Keyword;

use App\Services\Serp\SerpResultsService;
use App\Services\WebsiteContent\WebsiteContentService;

class CheckKeywordService
{
    public static function generate_report($keyword)
    {
        $serp_data = SerpResultsService::get_data($keyword);
        $link = $serp_data['links'][0];
        $link_data = WebsiteContentService::get_website_content($link);
        $text = $link_data->data;
        $website_html_content = iconv(mb_detect_encoding($text, mb_detect_order(), true), "UTF-8", $text);
        $link_data = WebsiteContentService::render_website_html($website_html_content);
        WebsiteContentService::download_website_pdf($link_data->data->filename);
//        dd($link_data->data->filename);
    }

    public static function analyze_results()
    {
        $path = storage_path('words.xml');
        $data = \File::get($path);
        $xml = simplexml_load_string($data);
        $text = '';
        $p = $xml->chunkList->children();
        foreach ($p as $i) {
            foreach ($i->children() as $c) {
                foreach ($c->children() as $chunk) {
                    $l = $chunk->lex;
                    $c_tag = (string)$l->ctag[0];
                    if ($c_tag && !in_array($c_tag, ['interp', 'qub', 'conj'])) {
                        $add = true;
                        foreach (['prep', 'num'] as $w) {
                            if (self::begin_with($c_tag, $w)) {
                                $add = false;
                                break;
                            }
                        }
                        if ($add) {
                            $text .= (string)$l->base[0] . ',';
                        }
                    }
                }
            }
        }
        dd($text);
    }

    /**
     * @param $text
     * @param $phrase
     * @return bool
     */
    protected static function begin_with($text, $phrase)
    {
        return strpos($text, $phrase) === 0;
    }
}
