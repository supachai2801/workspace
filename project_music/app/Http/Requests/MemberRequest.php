<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'username' => 'required|unique:tbl_members',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:tbl_members',
            'sex' => 'required',
            'address' => 'required',
            'county' => 'required',
            'image_p' => 'required|image',
        ];
    }

    public function messages(){
        return [
            'username.required' => 'กรุณากรอกข้อมูลชื่อผู้ใช้งานระบบ',
            'username.unique' => 'ชื่อผู้ใช้งานระบบนี้มีการใช้งานแล้ว',
            'password.required' => 'กรุณากรอกข้อมูลรหัสผ่าน',
            'password.confirmed' => 'รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน',
            'password_confirmation.required' => 'กรุณากรอกข้อมูลยืนยันรหัสผ่าน',
            'fname.required' => 'กรุณากรอกข้อมูลชื่อ',
            'lname.required' => 'กรุณากรอกข้อมูลสกุล',
            'phone.required' => 'กรุณากรอกข้อมูลเบอร์โทรติดต่อ',
            'emai.required' => 'กรุณากรอกข้อมูลอีเมล',
            'emai.unique' => 'อีเมลนี้มีผู้ใช้งานแล้ว',
            'sex.required' => 'กรุณากรอกข้อมูลเพศ',
            'address.required' => 'กรุณากรอกข้อมูลที่อยู่',
            'county.required' => 'กรุณากรอกข้อมูลจังหวัด',
            'image_p.required' => 'กรุณากรอกข้อมูลไฟล์ภาพ',
        ];
    }
}
