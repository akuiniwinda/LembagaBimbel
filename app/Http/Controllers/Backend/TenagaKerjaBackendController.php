<?php

namespace App\Http\Controllers\Backend;

use App\Models\TenagaKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TenagaKerjaBackendController extends Controller
{
    public function index(){
        $tenagakerjas = TenagaKerja::all();
        return view('page.backend.tenagakerja.index', compact('tenagakerjas'));
    }

    public function create(){
        $tenagakerjas = TenagaKerja::all();
        return view('page.backend.tenagakerja.create', compact('tenagakerjas'));
    }

    public function store(Request $request){
        $request->validate([
            'photo'             => 'required|image|mimes:jpeg,png,jpg,gif',
            'name'              => 'required',
            'description'       => 'required',
            'position'          => 'required'
        ]);

        $dataorang_store = [
            'name'              => $request->name,
            'description'       => $request->description,
            'position'          => $request->position
        ];

        //upload foto
        $dataorang_store['photo'] = $request->file('photo')->store('imgtenagakerja', 'public');

        TenagaKerja::create($dataorang_store);

        return redirect('/adminpanel/tenagakerja');
    }

    public function destroy($id){
        $datatenagakerja = TenagaKerja::find($id);

        if ($datatenagakerja != null){
            Storage::disk('public')->delete($datatenagakerja->photo);
            $datatenagakerja->delete();
        }

        return redirect('/adminpanel/tenagakerja');
    }

    public function show($id){
        //cari ke tabel kelas di database sesuai atau berdasarkan id kelas ada atau tidak
        $datatenaga = TenagaKerja::find($id);

        //cek apakah datanya ada atau tidak
        if($datatenaga == null){
            return redirect('/adminpanel/tenagakerja');
        }

        //kembalikan kelas ke halaman show dan kembalikan data user yang di ambil

        return view('page.backend.tenagakerja.show', compact('datatenaga'));
    }

    public function edit($id){
        //siapkan data atau panggil kelas
        $tenagakerja = TenagaKerja::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $datatenaga = TenagaKerja::find($id);

        //cek apakah datanya ada atau tidak
        if($datatenaga == null){
            return redirect('/adminpanel/tenagakerja');
        }

        return view('page.backend.tenagakerja.edit', compact('tenagakerja', 'datatenaga'));

    }

    public function update(Request $request, $id){
        //validasi data
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'name'              => 'required',
            'description'       => 'required',
            'position'          => 'required'
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $datatenaga = TenagaKerja::find($id);

        //siapkan data yang akan disiampan sebagai update
        $datatenagakerja_update = [
            'name'              => $request->name,
            'description'       => $request->description,
            'position'          => $request->position
        ];

        if ($request->hasFile('photo')){
            //hapus file gambar sebelumnya
            Storage::disk('public')->delete($datatenaga->photo);

            //upload gambar
            $datatenagakerja_update['photo'] = $request->file('photo')->store('imgtenagakerja', 'public');
        }

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $datatenaga->update($datatenagakerja_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/tenagakerja');
    }
}
