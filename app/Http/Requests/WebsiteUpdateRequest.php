<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam service_id integer ID of a service.
 */
class WebsiteUpdateRequest extends FormRequest
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
        $website_id = \Request::get('id');
        return [
            'url' => [
                'required',
                'string',
                'max:255',
                'min: 1',
                "unique:websites,url,{$website_id},id,deleted_at,NULL"
            ],
            'domain' => [
                'required',
                'string',
                'max:255',
                'min: 1',
                "unique:websites,domain,{$website_id},id,deleted_at,NULL"
            ],
            'ranking' => [
                'required',
                'integer'
            ],
        ];
    }
}
