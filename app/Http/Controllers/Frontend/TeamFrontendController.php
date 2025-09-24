<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;

class TeamFrontendController extends Controller
{
    public function index()
    {
        $activeTenagakerja = TenagaKerja::where('is_active', 1)->get();

        return view('page.frontend.team.index', compact('activeTenagakerja'));
    }
}
