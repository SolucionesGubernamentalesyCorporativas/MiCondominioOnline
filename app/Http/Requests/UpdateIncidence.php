<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncidence extends FormRequest
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
            'date' => 'date',
            'description' => 'string',
            'type_of_incidence_id' => 'numeric',
            'estate_id' => 'numeric',
            'ids' => 'numeric'
        ];
        $photos = count($this->input('photos'));
        foreach (range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png';
        }
        return $rules;
    }
}
