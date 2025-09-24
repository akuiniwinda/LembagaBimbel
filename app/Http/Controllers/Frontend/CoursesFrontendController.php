<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courses;

class CoursesFrontendController extends Controller
{
    public function index(){
        // Ambil data About yang aktif
            $activeCourses = Courses::where('is_active', 'active')->get();

        // Kirim ke view
        return view('page.frontend.courses.index', compact('activeCourses'));
    }
}
