<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Member;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function index(Request $request) {
        $provinces = Province::orderBy('name_th')->get();
        return view('register', compact('provinces'));
    }

    public function register(MemberRequest $request) {
            $inputs = $request->except(['_token',  'password_confirmation']);
            $inputs['password'] = Hash::make($inputs['password']);
            $inputs['image_p'] = $this->uploadFile($inputs['image_p'], 'image_members');
            $data = new Member($inputs);
            $data->save();
         
        

        return redirect('/')->with('message', 'ลงทะเบียนสำเร็จ');
    }

}
