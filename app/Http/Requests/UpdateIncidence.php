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
        return [
            'date' => 'date',
            'description' => 'string',
            'photo' => 'image|mimes:jpeg,bmp,png',
            'type_of_incidence' => 'numeric',
            'estate_id' => 'numeric'
        ];
    }
}
