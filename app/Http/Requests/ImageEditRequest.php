<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageEditRequest extends FormRequest
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
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'phone_number' => 'required|digits:10',
            'school_name' => 'required',
        ];
    }
}
