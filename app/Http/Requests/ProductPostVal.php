<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPostVal extends FormRequest
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
            'product_name' => 'required|max:111|min:2',
            'product_category' => 'required',
            'desription'=> 'required|min:5',
            'vks'=> 'required|unique:products,vks|min:4',  
            'price'=> 'required|numeric',
            'status'=> 'required',
            'image'=> 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }

            public function messages()
        {
            return [
                'vks.required' => 'The Product SKU field must be required.',
                'vks.unique' => 'The Product SKU has already been taken Insert onther.',
                'vks.min' => 'The Product SKU must be at least 4 characters. ',
                
            ];
        }

}
