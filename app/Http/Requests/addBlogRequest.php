<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addBlogRequest extends FormRequest
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
        return [
            'title' => ['required','string'],
            'description' => ['required','string'],
            'image' => ['file','mimes:jpg,jpeg,png,gif,svg|max:2048'],
            'category_id' => ['required', 'integer']
        ];
    }
}
