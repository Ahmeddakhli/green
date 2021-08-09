<?php

namespace App\Http\Requests\admin\products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_name' => 'required|string|max:225',
            'img.*' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpg|max: 10048',
            'user_id' => 'required',
            'discription' => 'required|string',
            'discound' => 'required|numeric',
            'price' => 'required|numeric',
            'country' => 'required|string|max:225',
            'made_by' => 'required|string|max:255',
            'quantity' => 'required||numeric',
            'categore'=> 'required|string|max:255'
        ];
    }
}
