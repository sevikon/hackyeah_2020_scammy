<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Log;
use Request;

class RestController extends Controller
{

    /**
     * @return object
     */
    protected static function get_search_order_details()
    {
        $limit = Request::get('page_size', 10);
        $page = Request::get('page', 0);
        $filters = Request::get('filters', []);
        $order_column = Request::get('order_column', 'created_at');
        $order_column = is_array($order_column) ? $order_column[0] : $order_column;
        $order_direction = Request::get('order_direction', 'desc');
        return (object)[
            'limit' => $limit,
            'page' => $page,
            'filters' => $filters,
            'order_column' => $order_column,
            'order_direction' => $order_direction,
        ];
    }

    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }

    protected function json_success($data = [], $code = 200)
    {
        return response()->json(['data' => $data], $code);
    }

    protected function privileges_error()
    {
        return $this->json_error(trans("messages.no_privileges"), null, 403);
    }

    /**
     * @param null $message
     * @param array $errors
     * @param int $code
     * @return JsonResponse
     */
    protected function json_error($message = null, $errors = [], $code = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors
        ], $code);
    }

    protected function internal_error(Exception $error)
    {
        Log::info($error->getMessage());
        return $this->json_error(trans("messages.internal_error"));
    }

    protected function not_found_error()
    {
        return $this->json_error(trans("messages.page_not_found"));
    }
}
