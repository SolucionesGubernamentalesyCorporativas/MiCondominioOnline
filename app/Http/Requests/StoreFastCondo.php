<?php

namespace App\Http\Requests;

use App\TypeOfEstate;
use Illuminate\Foundation\Http\FormRequest;

class StoreFastCondo extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'address' => 'required|string',
            'parking_spots' => 'required|numeric'
        ];

        $data = TypeOfEstate::all();

        foreach ($data as $typeOfEstate) {
            $rules[$typeOfEstate->name] = 'required|numeric';
        }

        return $rules;
    }
}
