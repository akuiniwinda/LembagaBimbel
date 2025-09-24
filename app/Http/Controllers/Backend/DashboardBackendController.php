<?php

namespace App\Http\Controllers\Backend;

use App\Models\Hero;
use App\Models\About;
use App\Models\Courses;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Testimoni;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardBackendController extends Controller
{
    public function index(){
        // Ambil hanya hero dengan status aktif
        $activeAbout = About::where('is_active', 'active')->get();

        $activeService = Service::where('is_active', 'active')->get();

        $activeHeros = Hero::where('is_active', 'active')->get();

        $activeTestimoni = Testimoni::where('is_active', 'active')->get();

        $activeCourses = Courses::where('is_active', 'active')->get();

        $activePartner = Partner::where('is_active', 'active')->get();

        $activeTenagakerja = TenagaKerja::where('is_active', 'active')->get();

        $activeGallery = Gallery::where('is_active', 'active')->get();

        // Kirim data ke view landing page
        return view('page.frontend.landing.index', compact('activeHeros','activeAbout', 'activeService',
         'activeTestimoni', 'activeCourses', 'activePartner','activeTenagakerja','activeGallery'));
    }
}
