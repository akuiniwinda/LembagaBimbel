<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersFrontendController extends Controller
{
    public function index(){

        // Ambil hanya hero dengan status aktif
        $activePartner = Partner::where('is_active', 'active')->get();

        // Kirim data ke view landing page
        return view('page.frontend.partners.index', compact('activePartner'));

    }
}
