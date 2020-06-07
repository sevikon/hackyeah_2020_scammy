<?php

namespace App\Http\Controllers\Keyword;

use App\Exceptions\WebException;
use App\Http\Controllers\RestController;
use App\Http\Requests\KeywordRequest;
use App\Http\Requests\KeywordUpdateRequest;
use App\Models\Keyword;
use App\Services\Keyword\KeywordService;
use App\Transformers\Keyword\KeywordTransformer;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

/**
 * Class KeywordsController
 * @group keywords
 *
 * @service App\Http\Controllers\Company
 */
class KeywordController extends RestController
{

    /**
     * index
     *
     * Get all keywords
     *
     * @transformercollection \App\Transformers\Keyword\KeywordTransformer
     * @transformerModel \App\Models\Keyword
     *
     * @return LengthAwarePaginator|mixed
     */
    public function index()
    {
        return $this->json_success(KeywordService::index());
    }


    /**
     * store
     *
     * Store a new service
     *
     * @transformer \App\Transformers\Keyword\KeywordTransformer
     * @transformerModel \App\Models\Keyword
     *
     * @param KeywordRequest $request
     * @return JsonResponse
     */
    public function store(KeywordRequest $request)
    {
        try {
            $data = $request->validated();
            $model = KeywordService::store($data);
            return $this->json_success($this->get_keyword_with_details($model));

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
     * @transformer \App\Transformers\Keyword\KeywordTransformer
     *
     * @param $keyword_id int required The id of the service. Example: 1
     * @return JsonResponse
     */
    public function show($keyword_id)
    {
        $keyword = self::get_keyword($keyword_id);
        return $this->json_success($this->get_keyword_with_details($keyword));
    }

    /**
     * update
     *
     * Update category by ID
     *
     * @urlParam service_id required integer The ID of the service.
     *
     * @transformer \App\Transformers\Keyword\KeywordTransformer
     *
     * @param KeywordUpdateRequest $request
     * @param $keyword_id int required The id of the service. Example: 1
     * @return JsonResponse
     */
    public function update(KeywordUpdateRequest $request, $keyword_id)
    {
        $keyword = self::get_keyword($keyword_id);
        $data = $request->validated();
        try {
            $keyword = KeywordService::update($keyword, $data);
            return $this->json_success($this->get_keyword_with_details($keyword));
        } catch (WebException $e) {
            return $this->json_error($e->getMessage());
        }
    }

    /**
     * delete
     *
     * Remove service by ID
     *
     * @urlParam $keyword_id required integer The ID of the service.
     *
     * @transformer \App\Transformers\Keyword\KeywordTransformer
     *
     * @param $id int required The id of the service. Example: 1
     * @return JsonResponse
     */
    public function delete($keyword_id)
    {
        $keyword = self::get_keyword($keyword_id);
        try {
            $keyword->delete();
        } catch (Exception $e) {
        }

        return $this->json_success($this->get_keyword_with_details($keyword));
    }


    /**
     * @param $keyword_id
     * @return Keyword
     */
    protected static function get_keyword($keyword_id)
    {
        return Keyword::findOrFail($keyword_id);
    }

    /**
     * @param Keyword $keyword
     * @return array
     */
    protected function get_keyword_with_details(Keyword $keyword)
    {
        return (new KeywordTransformer())->transform($keyword);
    }
}
