<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingFrontendController extends Controller
{
    public function index()
    {
        
        $activeAbout = About::where('is_active', 'active')->get();

        
        $activeHeros = Hero::where('is_active', 'active')->get();

        
        $activeService = Service::where('is_active', 'active')->get();

        // Kirim semua data ke view
        return view('page.frontend.landing.index', compact(
            'activeHeros',
            'activeAbout',
            'activeService' 
        ));
    }
}
