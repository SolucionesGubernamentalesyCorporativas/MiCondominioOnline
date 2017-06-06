<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceipt extends FormRequest
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
            'date' => 'required|date',
            'verified' => 'boolean',
            'ammount' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,bmp,png',
            'transaction_id' => 'required|numeric',
            'estate_id' => 'required|numeric'
        ];
    }
}
