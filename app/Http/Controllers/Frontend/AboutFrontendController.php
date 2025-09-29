<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutFrontendController extends Controller
{
    public function index()
    {
        // Ambil data About yang aktif
        $activeAbout = About::where('is_active', 'active')->first();

        // Kirim ke view
        return view('page.frontend.about.index', compact('activeAbout',));
    }
}
