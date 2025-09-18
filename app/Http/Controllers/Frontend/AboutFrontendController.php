<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutFrontendController extends Controller
{
    public function index(){

         $activeAbout = About::where('is_active', 'active')->get();
        return view('page.frontend.landing.index', compact('activeAbout'));

    }
}
