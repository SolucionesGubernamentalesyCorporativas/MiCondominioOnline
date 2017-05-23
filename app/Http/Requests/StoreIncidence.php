<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidence extends FormRequest
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
            'date' => 'required|date',
            'description' => 'required|string',
            'type_of_incidence_id' => 'required|numeric',
            'estate_id' => 'required|numeric',
        ];
        $photos = count($this->input('photos'));
        foreach (range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png';
        }
        return $rules;
    }
}
