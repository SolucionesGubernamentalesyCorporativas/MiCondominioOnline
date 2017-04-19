<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitor extends FormRequest
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
            'name' => 'required|string',
            'date_arrival' => 'required|date',
            'vehicle' => 'boolean',
            'user_id' => 'required|numeric',
            'type_of_visitor_id' => 'required|numeric'
        ];
    }
}
