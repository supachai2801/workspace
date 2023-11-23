<?php

namespace App\Http\Controllers;

use App\Arists;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {
        $arists = Arists::where('flag', 1)->take(20)->get();
        return view('index', compact('arists'));
    }

  

    public function contactUs(Request $request) {
        return view('contact-us');
    }

    public function aboutUs(Request $request) {
        return view('about-us');
    }
}
