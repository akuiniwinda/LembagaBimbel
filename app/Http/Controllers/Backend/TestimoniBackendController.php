<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TestimoniBackendController extends Controller
{
    public function index(){
        $testimonis = Testimoni::all();
        return view('page.backend.testimoni.index', compact('testimonis'));
    }

    public function create(){
        $testimonis = Testimoni::all();
        return view('page.backend.testimoni.create', compact('testimonis'));
    }

    public function store(Request $request){
        $request->validate([
            'photo_profile'     => 'required|image|mimes:jpeg,png,jpg,gif',
            'name'              => 'required',
            'description'       => 'required',
            'rating'            => 'required|numeric|between:0,5'
        ]);

        $datauser_store = [
            'name'              => $request->name,
            'description'       => $request->description,
            'rating'            => $request->rating
        ];

        //upload foto
        $datauser_store['photo_profile'] = $request->file('photo_profile')->store('imgtestimoni', 'public');

        Testimoni::create($datauser_store);

        return redirect('/adminpanel/testimoni');
    }

    public function destroy($id){
        $datatestimoni = Testimoni::find($id);

        if ($datatestimoni != null){
            Storage::disk('public')->delete($datatestimoni->photo_profile);
            $datatestimoni->delete();
        }

        return redirect('/adminpanel/testimoni');
    }

    public function show($id){
        //cari ke tabel kelas di database sesuai atau berdasarkan id kelas ada atau tidak
        $datatestimonis = Testimoni::find($id);

        //cek apakah datanya ada atau tidak
        if($datatestimonis == null){
            return redirect('/adminpanel/testimoni');
        }

        //kembalikan kelas ke halaman show dan kembalikan data user yang di ambil

        return view('page.backend.testimoni.show', compact('datatestimonis'));
    }

    public function edit($id){
        //siapkan data atau panggil kelas
        $testimonil = Testimoni::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $datatestimonis = Testimoni::find($id);

        //cek apakah datanya ada atau tidak
        if($datatestimonis == null){
            return redirect('/adminpanel/testimoni');
        }

        return view('page.backend.testimoni.edit', compact('testimonil', 'datatestimonis'));

    }

    public function update(Request $request, $id){
        //validasi data
        $request->validate([
            'photo_profile'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'name'              => 'required',
            'description'       => 'required',
            'rating'            => 'required|numberic|between:0,5'
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $datatestimonis = Testimoni::find($id);

        //siapkan data yang akan disiampan sebagai update
        $datatestimoni_update = [
            'name'              => $request->name,
            'description'       => $request->description,
            'rating'            => $request->rating
        ];

        if ($request->hasFile('photo_profile')){
            //hapus file gambar sebelumnya
            Storage::disk('public')->delete($datatestimonis->photo_profile);

            //upload gambar
            $datatestimoni_update['photo_profile'] = $request->file('photo_profile')->store('imgtestimoni', 'public');
        }

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $datatestimonis->update($datatestimoni_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/testimoni');
    }

    public function toggleActive(Request $request, $id){
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->is_active = $request->is_active == 1 ? 'active' : 'inactive';
        $testimoni->save();

        return response()->json([
            'success'   => true,
            'is_active' => $testimoni->is_active
        ]);
    }
}
