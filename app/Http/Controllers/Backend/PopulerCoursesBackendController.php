<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\PopularCourses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PopulerCoursesBackendController extends Controller
{

    public function create(){
        $popularCourses = PopularCourses::all();
        return view('page.backend.courses.popularcourses.create', compact('popularCourses'));
    }

    public function store(Request $request){
        $request->validate([
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif',
            'title'     => 'required',
            'harga'     => 'required',
            'name'      => 'required',
            'time'      => 'required',
            'student'   => 'required',
            'is_active' => 'nullable|in:active,no_active'
        ]);

        $data = [
            'title'     => $request->title,
            'harga'     => $request->harga,
            'name'      => $request->name,
            'time'      => $request->time,
            'student'   => $request->student,
            'is_active' => $request->has('status') ? 'active' : 'no_active',
        ];

        // upload foto
        $data['photo'] = $request->file('photo')->store('imgcourses', 'public');

        PopularCourses::create($data);

        return redirect('/adminpanel/courses');
    }

    public function destroy($id){
        $popularCourse = PopularCourses::find($id);

        if ($popularCourse != null){
            Storage::disk('public')->delete($popularCourse->photo);
            $popularCourse->delete();
        }

        return redirect('/adminpanel/courses');
    }

    public function show($id){
        $popularCourse = PopularCourses::find($id);

        if ($popularCourse == null){
            return redirect('/adminpanel/popularcourses');
        }

        return view('page.backend.courses.show', compact('popularCourse'));
    }

    public function edit($id){
        $popularCourses = PopularCourses::all();
        $popularCourse = PopularCourses::find($id);

        if ($popularCourse == null){
            return redirect('/adminpanel/courses');
        }

        return view('page.backend.courses.popularcourses.edit', compact('popularCourses', 'popularCourse'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'photo'     => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'title'     => 'required',
            'harga'     => 'required',
            'name'      => 'required',
            'time'      => 'required',
            'student'   => 'required',
            'is_active' => 'nullable|in:active,no_active'
        ]);

        $popularCourse = PopularCourses::find($id);

        $data = [
            'title'     => $request->title,
            'harga'     => $request->harga,
            'name'      => $request->name,
            'time'      => $request->time,
            'student'   => $request->student,
            'is_active' => $request->has('status') ? 'active' : 'no_active',
        ];

        if ($request->hasFile('photo')){
            Storage::disk('public')->delete($popularCourse->photo);
            $data['photo'] = $request->file('photo')->store('imgcourses', 'public');
        }

        $popularCourse->update($data);

        return redirect('/adminpanel/courses');
    }

    public function toggleActive(Request $request, $id){
        $popularCourse = PopularCourses::findOrFail($id);
        $popularCourse->is_active = $request->is_active == 1 ? 'active' : 'inactive';
        $popularCourse->save();

        return response()->json([
            'success'   => true,
            'is_active' => $popularCourse->is_active
        ]);
    }

}
