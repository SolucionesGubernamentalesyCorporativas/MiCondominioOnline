<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstate extends FormRequest
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
            'number' => 'required|string',
            'rented' => 'required|boolean',
            'number_of_parking_lots' => 'required|numeric',
            'notes' => 'string',
            'type_of_estate_id' => 'required|numeric'
        ];
    }
}
