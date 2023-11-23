<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\LoginRequest;
use App\Member;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $model = Member::where('username', $request->username)->first();
        if ($model == null) {
            return back()->with('error_message', 'ไม่พบข้อมูลผู้ใช้งานระบบ หรือรหัสผ่านไม่ถูกต้อง');
        }

        if (Hash::check($request->password, $model->password)) {
            if($model->flag =='0') {
            return back()->with('error_message', 'ไม่สามารถเข้าสู่ระบบได้เนื่องจากถูกร้องเรียนกรุณาติดต่อผู้ดูแลระบบ');

            }
            auth()->login($model);
            return back()->with('message', 'ยินดีต้อนรับ');
        }

        return back()->with('error_message', 'ไม่พบข้อมูลผู้ใช้งานระบบ หรือรหัสผ่านไม่ถูกต้อง');
    }

    public function editProfile()
    {
        if(!auth()->check()) {
            return redirect('/');
        }
        $provinces = Province::orderBy('name_th')->get();

        $auth = auth()->user();
        return view('edit-profile', compact('provinces', 'auth'));
    }
    public function editProfilePost(EditProfileRequest $request)
    {
        if(!auth()->check()) {
            return back()->with('error_message','กรุณาเข้าสู่ระบบก่อนลงทะเบียนวงดนตรี');
        }

        $inputs = $request->except(['_token']);
        if(!empty($inputs['image_p'])) {
            $inputs['image_p'] = $this->uploadFile($inputs['image_p'], 'image_members');
        }

        $data = Member::find(auth()->user()->id);
        $data->update($inputs);
        return back()->with('message','ทำรายการเรียบร้อยแล้ว');

    }

    public function logout()
    {
        auth()->logout();
        return back()->with('message', 'ออกจากระบบเรียบร้อยแล้ว');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(member $member)
    {
        //
    }
}
