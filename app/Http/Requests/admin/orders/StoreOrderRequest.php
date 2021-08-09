<?php

namespace App\Http\Requests\admin\orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'username'=> 'required|string|max:225',
            'email'=> 'required|string|max:225',
            'addres_detailes'=> 'required|string|max:225',
            'country_code'=> 'required|numeric|max:999'
            ,'phone_number' => 'required|numeric',
            'number' => 'required|numeric',
            'country' => 'required|string|max:225'
            ,'city' => 'required|string|max:225',
            'status' => 'required|max:225|integer'
            ,  'product_id' => 'required|max:225|integer',

        ];
    }
}
