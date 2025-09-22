<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutFrontendController extends Controller
{
    public function index(){

         $aktifAbout = About::where('is_active', 'active')->get();
        return view('page.frontend.about.index', compact('activeAbout'));

    }
}
