<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\PopularCourses;
use App\Models\TenagaKerja;
use App\Models\Testimoni;

class LandingFrontendController extends Controller
{

    public function index(){
        // Ambil hanya hero dengan status aktif

        $activeAbout = About::where('is_active', 'active')->first();

        $activeService = Service::where('is_active', 'active')->get();

        $activeHeros = Hero::where('is_active', 'active')->first();

        $activeTestimoni = Testimoni::where('is_active', 'active')->get();

        $activeCourses = Courses::where('is_active', 'active')->get();

        $activePopularCourses = PopularCourses::where('is_active', 'active')->get();

        $activePartner = Partner::where('is_active', 'active')->get();

        $activeTenagakerja = TenagaKerja::where('is_active', 'active')->get();

        $activeGallery = Gallery::where('is_active', 'active')->get();

        // Kirim data ke view landing page
        return view('page.frontend.landing.index', compact('activeHeros','activeAbout', 'activeService',
         'activeTestimoni', 'activeCourses', 'activePartner','activeTenagakerja','activeGallery', 'activePopularCourses'));
    }
}
