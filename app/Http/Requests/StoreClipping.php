<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClipping extends FormRequest
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
        switch ($this->method())
        {
            case 'POST':
                return [
                    'url'   => 'required|url|unique:clippings',
                    'title' => 'required',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'url'   => [
                        'required',
                        'url',
                        Rule::unique('clippings')->ignore($this->clipping->id),
                    ],
                    'title' => 'required',
                ];
            case 'GET':
            case 'DELETE':
            default:
                return [];
        }
    }
}
