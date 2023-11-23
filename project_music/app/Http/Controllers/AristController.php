<?php

namespace App\Http\Controllers;

use App\Arists;
use App\Events;
use App\Http\Requests\AristRegisterRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Report;
use App\Review;
use App\TypeMusic;
use App\VideoArist;
use Illuminate\Http\Request;

class AristController extends Controller
{
    public function arist(Request $request)
    {
        $style = TypeMusic::with(['arist' => function ($q) use ($request) {
            $q->where('flag', 1);
            $q->when($request->aname, function ($qu) use ($request) {
                $qu->where('aname', 'like', "%{$request->aname}%");
                
            });
        }])->get();

        return view('arist.arist', compact('style'));
    }
    public function cancelEvent($id) {
        $event = Events::findOrFail($id);

        if($event->member_id == auth()->user()->id) {
            $event->delete();
            return back()->with('message', 'ทำรายการเรียบร้อยแล้ว');
        }
        return redirect('/');
    }
    public function report($id, Request $request) {
        Report::insert(['details_report' => $request->text, 'arists_id'=> $id, 'member_id' => auth()->user()->id]);
        return true;
    }
    public function updateEvent($status, $id) {
        
        $event = Events::find($id);
        $event->event_b = $status;
        if(empty(auth()->user()->arist->first())) {
            return back();
        }
        if(auth()->user()->arist->first()->id == $event->arists_id)
            $event->save();
        
        return back()->with('message', 'ทำรายการเรียบร้อยแล้ว');
    }
    public function editReview(Request $request, $id) {
        $inputs = $request->except('_token');
        Review::find($id)->update($inputs);
        return back()->with('message', 'ทำรายการเรียบร้อยแล้ว');
    }
    public function review(Request $request) {
        $inputs = $request->except('_token');
        $inputs['created_at'] = now();
        Review::insert($inputs);
        return back()->with('message', 'ทำรายการเรียบร้อยแล้ว');
    }
    public function removeVideo($id)
    {
        VideoArist::find($id)->delete();

        return back()->with('message', 'ทำรายการเรียบร้อยแล้ว');
    }

    public function editProfile() {
        $style = TypeMusic::get();
        $arist = auth()->user()->arist->first();
        if(empty($arist)) {
            abort(404);
        }
        return view('arist.edit-profile', compact('style', 'arist'));
    }
    public function editProfilePost(Request $request) {
        $inputs = $request->except(['_token']);
        $inputs['member_id'] = auth()->user()->id;
        $inputs['created_at'] = now();
        if($inputs['image_a']) 
            $inputs['image_a'] = $this->uploadFile($inputs['image_a'], 'image_arist');

        $arist = auth()->user()->arist->first();
        if(empty($arist)) {
            abort(404);
        }
        $arist = Arists::find($arist->id);
        $arist->update($inputs);

        return back()->with('message', 'ทำรายการเรียบร้อยแล้ว');
    }
    public function detail(Arists $item, $id)
    {
        $reviews = Review::where('arists_id', $id)->get();
        $item = $item->with('videos', 'event')->findOrFail($id);
        $event = $item->event->map(function ($i) {
            $result = [];
            $result['start'] = $i->event_date;
            // $result['display'] = 'background';
            $result['id'] = $i->id;
            $result['extendedProps'] = $i;
            if($i->event_b == 1) {
                $result['color'] = 'oragne';
            } elseif($i->event_b == 2) {
                $result['color'] = 'green';
            } else {
                $result['color'] = 'red';
            }
            $result['title'] = $i->member->fname . ' ' . $i->member->lname;
            return $result;
        });
        $events = $event->toJson();
        return view('detail', compact('item', 'events', 'reviews'));
    }
    public function register()
    {
        $style = TypeMusic::get();
        if (!auth()->check()) {
            return back()->with('error_message', 'กรุณาเข้าสู่ระบบก่อนลงทะเบียนวงดนตรี');
        }
        if (count(auth()->user()->arist) > 0) {
            return back()->with('error_message', 'มีการลงทะเบียนวงดนตรีแล้ว');
        }
        return view('arist.register', compact('style'));
    }

    public function store(AristRegisterRequest $request)
    {
        $inputs = $request->except(['_token']);
        $inputs['member_id'] = auth()->user()->id;
        $inputs['created_at'] = now();
        $inputs['image_a'] = $this->uploadFile($inputs['image_a'], 'image_arist');
        Arists::insert($inputs);

        return redirect('/')->with('message', 'ลงทะเบียนวงดนตรีเรียบร้อยแล้ว');
    }

    public function addVideo($id)
    {
        return view('arist.add-video', compact('id'));
    }

    public function addVideoPost(UpdateVideoRequest $request, $id)
    {
        $inputs = $request->except(['_token']);
        $inputs['arists_id'] = $id;
        $inputs['created_at'] = now();

        VideoArist::insert($inputs);
        return redirect('/arists/' . $id)->with('message', 'ทำรายการเรียบร้อยแล้ว');
    }

    public function storeEvent(Request $request, $id)
    {
        $inputs = $request->all();
        $inputs['member_id'] = auth()->user()->id;
        $inputs['arists_id'] = $id;
        $inputs['event_b'] = 1;
        $inputs['created_at'] = now();
        // dd($inputs);
        Events::insert($inputs);
        $result['color'] = 'oragne';
        $result['start'] = $inputs['event_date'];
        // $result['display'] = 'background';
        $result['title'] = auth()->user()->fname . ' ' . auth()->user()->lname;
        return $result;
        return back()->with('message', 'ทำรายการเรียบร้อยแล้ว');
    }
}
