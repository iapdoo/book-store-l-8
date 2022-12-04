<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name_ar'           =>'required|string',
            'product_name_en'           =>'required|string',
            'product_image'          =>'required|image',
            'product_description_ar'    =>'required|string',
            'product_description_en'    =>'required|string',
            'product_price'          =>'required|integer',
            'product_quantity'       =>'required|integer',
        ];
    }
}
