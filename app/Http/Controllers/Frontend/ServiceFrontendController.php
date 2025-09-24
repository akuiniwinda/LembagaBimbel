<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceFrontendController extends Controller
{
    public function index()
    {
        $activeService = Service::where('is_active', 1)->get();

        return view('page.frontend.service.index', compact('activeService'));
    }
}
