<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutBackendController extends Controller
{
    public function index(){
        $aboutes = About::all();
        return view('page.backend.about.index', compact('aboutes'));
    }

    public function create(){
        $aboutes = About::all();
        return view('page.backend.about.create', compact('aboutes'));
    }

    public function store(Request $request){
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'description'       => 'required',
            'is_active'         => 'nullable|in:active,no_active'
        ]);

        $databout_store = [
            'description'       => $request->description,
            'is_active'         => true
        ];

        //upload foto
        $databout_store['photo'] = $request->file('photo')->store('imgabout', 'public');

        About::create($databout_store);

        return redirect('/adminpanel/about');
    }

    public function destroy($id){
        $databout = About::find($id);

        if ($databout != null){
            Storage::disk('public')->delete($databout->photo);
            $databout->delete();
        }

        return redirect('/adminpanel/about');
    }

    public function show($id){
        //cari ke tabel kelas di database sesuai atau berdasarkan id kelas ada atau tidak
        $databouts = About::find($id);

        //cek apakah datanya ada atau tidak
        if($databouts == null){
            return redirect('/adminpanel/about');
        }

        //kembalikan kelas ke halaman show dan kembalikan data user yang di ambil

        return view('page.backend.about.show', compact('databouts'));
    }

    public function edit($id){
        //siapkan data atau panggil kelas
        $abouts = About::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $databouts = About::find($id);

        //cek apakah datanya ada atau tidak
        if($databouts == null){
            return redirect('/adminpanel/about');
        }

        return view('page.backend.about.edit', compact('abouts', 'databouts'));

    }

    public function update(Request $request, $id){
        //validasi data
        $request->validate([
            'photo'            => 'required |image|mimes:jpeg,png,jpg,gif',
            'description'      => 'required'
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $databout = About::find($id);

        //siapkan data yang akan disiampan sebagai update
        $databout_update = [
            'description'      => $request->description,
        ];

        if ($request->hasFile('photo')){
            //hapus file gambar sebelumnya
            Storage::disk('public')->delete($databout->photo);

            //upload gambar
            $databout_update['photo'] = $request->file('photo')->store('imgabout', 'public');
        }

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $databout->update($databout_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/about');
    }

    // app/Http/Controllers/BoutController.php
    public function toggleActive(Request $request, $id){
    $about = About::findOrFail($id);

    $request->validate([
        'is_active' => 'required|in:active,no_active',
    ]);

    $about->update([
        'is_active' => $request->is_active,
    ]);

    return response()->json([
        'success' => true,
        'id' => $about->id,
        'status' => $request->is_active,
    ]);
}



}
