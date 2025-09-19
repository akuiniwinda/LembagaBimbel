<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class LandingFrontendController extends Controller
{
    public function index(){

         $activeAbout = About::where('is_active', 'active')->get();

         $activeService = Service::where('is_active', 'active')->get();

        // Ambil hanya hero dengan status aktif
        $activeHeros = Hero::where('is_active', 'active')->get();

        // Kirim data ke view landing page
        return view('page.frontend.landing.index', compact('activeHeros','activeAbout', 'activeService'));
    }
}
