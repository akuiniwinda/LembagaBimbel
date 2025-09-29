<?php

namespace App\Http\Controllers\Backend;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HeroBackendController extends Controller
{
    public function index()
    {
        $heros = Hero::all();
        return view('page.backend.hero.index', compact('heros'));
    }

    public function create()
    {
        $heros = Hero::all();
        return view('page.backend.hero.create', compact('heros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo'       => 'required|image|mimes:jpeg,png,jpg,gif',
            'title'       => 'required',
            'is_active'   => 'nullable|in:active,no_active'
        ]);

        $datahero_store = [
            'title'       => $request->title,
            'is_active' => $request->has('is_active') ? 'active' : 'no_active',
        ];

        //upload foto
        $datahero_store['photo'] = $request->file('photo')->store('imghero', 'public');

        // Tentukan status aktif berdasarkan checkbox
        // Checkbox jika dicentang akan mengirimkan 'on', jika tidak maka null
        $isActive = $request->has('is_active') ? 'active' : 'no_active';



        Hero::create($datahero_store);

        return redirect('/adminpanel/hero');
    }

    public function destroy($id)
    {
        $datahero = Hero::find($id);

        if ($datahero != null) {
            Storage::disk('public')->delete($datahero->photo);
            $datahero->delete();
        }

        return redirect('/adminpanel/hero');
    }

    public function show($id)
    {
        //cari ke tabel kelas di database sesuai atau berdasarkan id kelas ada atau tidak
        $datahiros = Hero::find($id);

        //cek apakah datanya ada atau tidak
        if ($datahiros == null) {
            return redirect('/adminpanel/hero');
        }

        //kembalikan kelas ke halaman show dan kembalikan data user yang di ambil

        return view('page.backend.hero.show', compact('datahiros'));
    }

    public function edit($id)
    {
        //siapkan data atau panggil kelas
        $heros = Hero::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $datahiros = Hero::find($id);

        //cek apakah datanya ada atau tidak
        if ($datahiros == null) {
            return redirect('/adminpanel/hero');
        }

        return view('page.backend.hero.edit', compact('heros', 'datahiros'));
    }

    public function update(Request $request, $id)
    {
        //validasi data
        $request->validate([
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'title'       => 'required',
            'is_active'   => 'nullable|in:active,no_active'
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $datahero = Hero::find($id);

        //siapkan data yang akan disiampan sebagai update
        $datahero_update = [
            'title'       => $request->title,
            'is_active' => $request->has('is_active') ? 'active' : 'no_active',
        ];

        if ($request->hasFile('photo')) {
            //hapus file gambar sebelumnya
            Storage::disk('public')->delete($datahero->photo);

            //upload gambar
            $datahero_update['photo'] = $request->file('photo')->store('imghero', 'public');
        }

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $datahero->update($datahero_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/hero');
    }

    public function toggleActive(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);
        $hero->is_active = $request->is_active == 1 ? 'active' : 'no_active';
        $hero->save();

        return response()->json([
            'success'   => true,
            'is_active' => $hero->is_active
        ]);
    }
}
