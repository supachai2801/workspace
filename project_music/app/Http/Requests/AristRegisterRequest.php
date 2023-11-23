<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AristRegisterRequest extends FormRequest
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
            'aname' => 'required|unique:tbl_arists',
            'details' => 'required',
            'style' => 'required',
            'image_a' => 'required|image'
        ];
    }
}
