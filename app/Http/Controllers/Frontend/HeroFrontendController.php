<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroFrontendController extends Controller
{
    public function index(){

        // Ambil hanya hero dengan status aktif
        $activeHeros = Hero::where('is_active', 'active')->get();

        // Kirim data ke view landing page
        return view('page.frontend.landing.index', compact('activeHeros'));

    }
}
