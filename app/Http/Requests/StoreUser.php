<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required|confirmed|alpha_dash|min:8',
            'membership_id' => 'required|numeric',
            'role_id' => 'required|numeric',
            'estate_id' => 'string|nullable',
            'condo_ids' => 'string|nullable'
        ];
    }
}
