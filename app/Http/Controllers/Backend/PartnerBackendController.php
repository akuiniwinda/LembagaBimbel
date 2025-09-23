<?php

namespace App\Http\Controllers\Backend;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PartnerBackendController extends Controller
{
    public function index(){
        $partneres = Partner::all();
        return view('page.backend.partner.index', compact('partneres'));
    }

    public function create(){
        $partneres = Partner::all();
        return view('page.backend.partner.create', compact('partneres'));
    }

    public function store(Request $request){
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'name'             => 'required',
            'description'       => 'required'
        ]);

        $datapartners_store = [
            'name'             => $request->name,
            'description'       => $request->description
        ];

        //upload foto
        $datapartners_store['photo'] = $request->file('photo')->store('imgparner', 'public');

        Partner::create($datapartners_store);

        return redirect('/adminpanel/partner');
    }

    public function destroy($id){
        $datapartner = Partner::find($id);

        if ($datapartner != null){
            Storage::disk('public')->delete($datapartner->photo);
            $datapartner->delete();
        }

        return redirect('/adminpanel/partner');
    }

    public function show($id){
        //cari ke tabel kelas di database sesuai atau berdasarkan id kelas ada atau tidak
        $dataparnerse = Partner::find($id);

        //cek apakah datanya ada atau tidak
        if($dataparnerse == null){
            return redirect('/adminpanel/partner');
        }

        //kembalikan kelas ke halaman show dan kembalikan data user yang di ambil

        return view('page.backend.partner.show', compact('dataparnerse'));
    }

    public function edit($id){
        //siapkan data atau panggil kelas
        $partnerses = Partner::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $dataparnerse = Partner::find($id);

        //cek apakah datanya ada atau tidak
        if($dataparnerse == null){
            return redirect('/adminpanel/gallery');
        }

        return view('page.backend.about.edit', compact('partnerses', 'dataparnerse'));

    }

    public function update(Request $request, $id){
        //validasi data
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'name'             => 'required',
            'description'       => 'required'
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $dataparnerse = Partner::find($id);

        //siapkan data yang akan disiampan sebagai update
        $datapartner_update = [
            'name'             => $request->name,
            'description'       => $request->description
        ];

        if ($request->hasFile('photo')){
            //hapus file gambar sebelumnya
            Storage::disk('public')->delete($dataparnerse->photo);

            //upload gambar
            $datapartner_update['photo'] = $request->file('photo')->store('imgpartner', 'public');
        }

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $dataparnerse->update($datapartner_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/partner');
    }

    public function toggleActive(Request $request, $id){
        $partner = Partner::findOrFail($id);
        $partner->is_active = $request->is_active == 1 ? 'active' : 'inactive';
        $partner->save();

        return response()->json([
            'success'   => true,
            'is_active' => $partner->is_active
        ]);
    }
}
