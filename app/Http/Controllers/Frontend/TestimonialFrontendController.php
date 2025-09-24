<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimonialFrontendController extends Controller
{
    public function index()
    {
        $activeTestimoni = Testimoni::where('is_active', 1)->get();

        return view('page.frontend.testimonial.index', compact('activeTestimoni'));
    }
}
