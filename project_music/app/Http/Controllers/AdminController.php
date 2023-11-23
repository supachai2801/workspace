<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminLoginRequest;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function logout() {
        auth('admin')->logout();
        return redirect('admin/');
    }
    public function login() {
        if(auth('admin')->check()) {
            return redirect('admin/');
        }
        return view('admin.login');
    }

    public function loginPost(AdminLoginRequest $request) {

        $model = Admin::where('admin_name', $request->username)->first();
        if ($model == null) {
            return back()->with('error_message', 'ไม่พบข้อมูลผู้ใช้งานระบบ หรือรหัสผ่านไม่ถูกต้อง');
        }

        if (Hash::check($request->password, $model->admin_password)) {
            auth('admin')->login($model);
            return back()->with('message', 'ยินดีต้อนรับ');
        }

        return back()->with('error_message', 'ไม่พบข้อมูลผู้ใช้งานระบบ หรือรหัสผ่านไม่ถูกต้อง');
    }

    public function approve($status, $id) {
        $report = Report::with(['arist'=>function($q) {
            $q->with(['reports' => function($c) {
                $c->where('flag', 1);
            }]);
        }])->findOrFail($id);
        
        if($report->arist->reports->count() >= 3) {
            $arist = $report->arist;
            $member = $report->arist->member;
            $member->flag = $status == '1' ? '0' : '1';
            $arist->flag = $status == '1' ? '0' : '1';
            $member->save();
            $arist->save();  
        }
           
        $report->flag=$status;
        $report->save();
        return back()->with('message', 'ทำรายการเรียบร้อยแล้ว');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::with(['arist'=>function($q) {
            $q->with(['reports' => function($c) {
                $c->where('flag', 1);
            }]);
        }])->orderBy('id', 'desc')->paginate(20);
        return view('admin.index', compact('reports'));
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
