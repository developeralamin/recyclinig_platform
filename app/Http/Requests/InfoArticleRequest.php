<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class InfoArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'keywords'          => 'required',
            'status'            => 'required',
            'article_type'      => 'required',
            'has_image'         => 'required',
            'has_youtube_video' => 'required',
            'format'            => 'required',
        ];
    }
}
