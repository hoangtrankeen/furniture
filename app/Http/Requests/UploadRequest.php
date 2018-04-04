<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'name' => 'required'
        ];

        $images = count($this->input('images'));
        foreach(range(0, $images) as $index) {
            $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:5000';
        }

        return $rules;
    }
}
