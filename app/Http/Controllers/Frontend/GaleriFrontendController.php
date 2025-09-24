<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GaleriFrontendController extends Controller
{
    public function index(){
        // Ambil data About yang aktif
            $activeGallery = Gallery::where('is_active', 'active')->get();

        // Kirim ke view
        return view('page.frontend.galeri.index', compact('activeGallery'));
    }
}
