<?php

namespace App\Http\Controllers\Website;

use App\Exceptions\WebException;
use App\Http\Controllers\RestController;
use App\Http\Requests\WebsiteRequest;
use App\Http\Requests\WebsiteUpdateRequest;
use App\Models\Website;
use App\Services\Website\WebsiteService;
use App\Transformers\Website\WebsiteTransformer;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

/**
 * Class WebsitesController
 * @group websites
 *
 * @service App\Http\Controllers\Company
 */
class WebsiteController extends RestController
{

    /**
     * index
     *
     * Get all websites
     *
     * @transformercollection \App\Transformers\Website\WebsiteTransformer
     * @transformerModel \App\Models\Website
     *
     * @return LengthAwarePaginator|mixed
     */
    public function index()
    {
        return $this->json_success(WebsiteService::index());
    }


    /**
     * store
     *
     * Store a new service
     *
     * @transformer \App\Transformers\Website\WebsiteTransformer
     * @transformerModel \App\Models\Website
     *
     * @param WebsiteRequest $request
     * @return JsonResponse
     */
    public function store(WebsiteRequest $request)
    {
        try {
            $data = $request->validated();
            $model = WebsiteService::store($data);
            return $this->json_success($this->get_website_with_details($model));

        } catch (WebException $e) {
            $details = $e->getDetails();
            return $this->json_error($e->getMessage(), $details, $details && count($details) > 0 ? 422 : 400);
        }
    }


    /**
     * get
     *
     * Get service by ID
     *
     * @urlParam service_id required integer The ID of the service.
     *
     * @transformer \App\Transformers\Website\WebsiteTransformer
     *
     * @param $website_id int required The id of the service. Example: 1
     * @return JsonResponse
     */
    public function show($website_id)
    {
        $website = self::get_website($website_id);
        return $this->json_success($this->get_website_with_details($website));
    }

    /**
     * update
     *
     * Update category by ID
     *
     * @urlParam service_id required integer The ID of the service.
     *
     * @transformer \App\Transformers\Website\WebsiteTransformer
     *
     * @param WebsiteUpdateRequest $request
     * @param $website_id int required The id of the service. Example: 1
     * @return JsonResponse
     */
    public function update(WebsiteUpdateRequest $request, $website_id)
    {
        $website = self::get_website($website_id);
        $data = $request->validated();
        try {
            $website = WebsiteService::update($website, $data);
            return $this->json_success($this->get_website_with_details($website));
        } catch (WebException $e) {
            return $this->json_error($e->getMessage());
        }
    }

    /**
     * delete
     *
     * Remove service by ID
     *
     * @urlParam $website_id required integer The ID of the service.
     *
     * @transformer \App\Transformers\Website\WebsiteTransformer
     *
     * @param $id int required The id of the service. Example: 1
     * @return JsonResponse
     */
    public function delete($website_id)
    {
        $website = self::get_website($website_id);
        try {
            $website->delete();
        } catch (Exception $e) {
        }

        return $this->json_success($this->get_website_with_details($website));
    }


    /**
     * @param $website_id
     * @return Website
     */
    protected static function get_website($website_id)
    {
        return Website::findOrFail($website_id);
    }

    /**
     * @param Website $website
     * @return array
     */
    protected function get_website_with_details(Website $website)
    {
        return (new WebsiteTransformer())->transform($website);
    }
}
