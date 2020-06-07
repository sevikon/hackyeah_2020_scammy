<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam service_id integer ID of a service.
 */
class KeywordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $keyword_id = \Request::get('id');
        return [
            'keyword_title' => [
                'required',
                'string',
                'max:255',
                'min: 1',
                "unique:keywords,keyword_title,{$keyword_id},id,deleted_at,NULL"
            ],
            'keyword_value' => [
                'required',
                'integer'
            ],
        ];
    }
}
