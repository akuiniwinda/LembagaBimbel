<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesFrontendController extends Controller
{
    public function index(){
        // Ambil data About yang aktif
            $activeCourses = Contact::where('is_active', 'active')->get();

        // Kirim ke view
        return view('page.frontend.courses.index', compact('activeCourses'));
    }
}
