<?php namespace App\Services\Serp;

use App\Exceptions\WebException;

class SerpResultsService
{
    /**
     * @param $keyword
     * @throws WebException
     */
    public static function get_data($keyword)
    {
        $results = SerpResultsApiService::get_serp_results($keyword);
        \Log::info(json_encode($results->data->organic_results));
        $data = $results->data;
        $s = $data->ads;
        $links = [];
        foreach ($s as $model){
            $links[] = $model->link;
        }
        $organic_results = $data->organic_results;
        foreach ($organic_results as $model) {
            $links[] = $model->link;
        }
        $local_results = $data->local_results;
        foreach ($local_results as $model){
            $links[] = $model->link;
        }
        return [
            'links' => $links
        ];
    }
}
