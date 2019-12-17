<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPostVal extends FormRequest
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
            'category_name' => 'required|max:111|min:2',
            'category_desc' => 'required|max:155|min:5',
        ];
    }

    public function messages()
{
    return [
        'category_name.required' => 'Category Name is required',
        'category_desc.required'  => 'Category Description is required',
    ];
}
}
