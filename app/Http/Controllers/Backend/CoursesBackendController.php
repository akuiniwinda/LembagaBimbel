<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\PopularCourses; // tambahkan model popular
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoursesBackendController extends Controller
{

    public function create()
    {
        $courses = Courses::all();
        return view('page.backend.courses.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif',
            'title'     => 'required',
            'harga'     => 'required',
            'name'      => 'required',
            'time'      => 'required',
            'student'   => 'required',
            'is_active' => 'nullable|in:active,no_active'
        ]);

        $datacourses_store = [
            'title'     => $request->title,
            'harga'     => $request->harga,
            'name'      => $request->name,
            'time'      => $request->time,
            'student'   => $request->student,
            'is_active' => $request->has('status') ? 'active' : 'no_active',
        ];

        // upload foto
        $datacourses_store['photo'] = $request->file('photo')->store('imgcourses', 'public');

        Courses::create($datacourses_store);

        return redirect('/adminpanel/courses');
    }

    public function destroy($id)
    {
        $datacours = Courses::find($id);

        if ($datacours != null) {
            Storage::disk('public')->delete($datacours->photo);
            $datacours->delete();
        }

        return redirect('/adminpanel/courses');
    }

    public function show($id)
    {
        $datakursus = Courses::find($id);

        if ($datakursus == null) {
            return redirect('/adminpanel/courses');
        }

        return view('page.backend.courses.show', compact('datakursus'));
    }

    public function edit($id)
    {
        $kursus = Courses::all();
        $datakursus = Courses::find($id);

        if ($datakursus == null) {
            return redirect('/adminpanel/courses');
        }

        return view('page.backend.courses.edit', compact('kursus', 'datakursus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif',
            'title'     => 'required',
            'harga'     => 'required',
            'name'      => 'required',
            'time'      => 'required',
            'student'   => 'required',
            'is_active' => 'nullable|in:active,no_active'
        ]);

        $datakursus = Courses::find($id);

        $datacourses_update = [
            'title'     => $request->title,
            'harga'     => $request->harga,
            'name'      => $request->name,
            'time'      => $request->time,
            'student'   => $request->student,
            'is_active' => $request->has('status') ? 'active' : 'no_active',
        ];

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($datakursus->photo);
            $datacourses_update['photo'] = $request->file('photo')->store('imgcourses', 'public');
        }

        $datakursus->update($datacourses_update);

        return redirect('/adminpanel/courses');
    }

    public function toggleActive(Request $request, $id)
    {
        $courses = Courses::findOrFail($id);
        $courses->is_active = $request->is_active == 1 ? 'active' : 'inactive';
        $courses->save();

        return response()->json([
            'success'   => true,
            'is_active' => $courses->is_active
        ]);
    }
}
