<?php

namespace App\Http\Requests\admin\users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
           
            'full_name' => 'required|string|max:30',
            'username' => 'required|string|max:30|unique:users',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'required|string|min:11',
            'country_code' => 'required',

        ];
    }
}
