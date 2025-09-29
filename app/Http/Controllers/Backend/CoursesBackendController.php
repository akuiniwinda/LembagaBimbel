<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoursesBackendController extends Controller
{
    public function index()
    {
        $courses = Courses::all();
        return view('page.backend.courses.index', compact('courses'));
    }

    public function create()
    {
        $courses = Courses::all();
        return view('page.backend.courses.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'title'             => 'required',
            'harga'             => 'required',
            'name'              => 'required',
            'time'              => 'required',
            'student'           => 'required',
            'is_active'         => 'nullable|in:active,no_active'
        ]);

        $datacourses_store = [
            'title'             => $request->title,
            'harga'             => $request->harga,
            'name'              => $request->name,
            'time'              => $request->time,
            'student'           => $request->student,
            'is_active' => $request->has('is_active') ? 'active' : 'no_active',
        ];

        //upload foto
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
        //cari ke tabel kelas di database sesuai atau berdasarkan id kelas ada atau tidak
        $datakursus = Courses::find($id);

        //cek apakah datanya ada atau tidak
        if ($datakursus == null) {
            return redirect('/adminpanel/courses');
        }

        //kembalikan kelas ke halaman show dan kembalikan data user yang di ambil

        return view('page.backend.courses.show', compact('datakursus'));
    }

    public function edit($id)
    {
        //siapkan data atau panggil kelas
        $kursus = Courses::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $datakursus = Courses::find($id);

        //cek apakah datanya ada atau tidak
        if ($datakursus == null) {
            return redirect('/adminpanel/courses');
        }

        return view('page.backend.courses.edit', compact('kursus', 'datakursus'));
    }

    public function update(Request $request, $id)
    {
        //validasi data
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'title'             => 'required',
            'harga'             => 'required',
            'name'              => 'required',
            'time'              => 'required',
            'student'           => 'required',
            'is_active'         => 'nullable|in:active,no_active'
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $datakursus = Courses::find($id);

        //siapkan data yang akan disiampan sebagai update
        $datacourses_update = [
            'title'             => $request->title,
            'harga'             => $request->harga,
            'name'              => $request->name,
            'time'              => $request->time,
            'student'           => $request->student,
            'is_active' => $request->has('is_active') ? 'active' : 'no_active',
        ];

        if ($request->hasFile('photo')) {
            //hapus file gambar sebelumnya
            Storage::disk('public')->delete($datakursus->photo);

            //upload gambar
            $datacourses_update['photo'] = $request->file('photo')->store('imgcourses', 'public');
        }

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $datakursus->update($datacourses_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/courses');
    }

    public function toggleActive(Request $request, $id)
    {
        $courses = Courses::findOrFail($id);
        $courses->is_active = $request->is_active == 1 ? 'active' : 'no_active';
        $courses->save();

        return response()->json([
            'success'   => true,
            'is_active' => $courses->is_active
        ]);
    }
}
