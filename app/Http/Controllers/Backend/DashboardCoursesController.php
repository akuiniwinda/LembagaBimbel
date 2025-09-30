<?php

namespace App\Http\Controllers\Backend;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Models\PopularCourses;
use App\Http\Controllers\Controller;

class DashboardCoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::all();
        $popularCourses = PopularCourses::all();

        return view('page.backend.courses.index', compact('courses', 'popularCourses'));
    }
}
