<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

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

    /**
     * Trimmed attributes
     *
     * @return array Trimmed attributes
     */
    public function attrs()
    {
        $attrs = $this->except(['_token', '_method']);
        $attrs['user_id'] = Auth::user()->id;

        return $attrs;
    }
}
