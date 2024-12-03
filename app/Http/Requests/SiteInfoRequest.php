<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteInfoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'            => 'required',
            'tagline'          => 'required',
            'logo'             => 'nullable',
            'meta_keywords'    => 'nullable',
            'meta_description' => 'nullable',
            'openai_api_key'   => 'nullable',
        ];
    }
}
