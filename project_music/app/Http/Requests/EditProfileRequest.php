<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:tbl_members,email,'.auth()->user()->id,
            'sex' => 'required',
            'address' => 'required',
            'county' => 'required',
        ];
    }
}
