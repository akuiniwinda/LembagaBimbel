<?php

namespace App\Http\Controllers\Backend;

use App\Models\MediaSosial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MediaSosialBackendController extends Controller
{
    public function index(){
        $medsos = MediaSosial::all();
        return view('page.backend.mediasosial.index', compact('medsos'));
    }

    public function create(){
        $medsos = MediaSosial::all();
        return view('page.backend.mediasosial.create', compact('medsos'));
    }

    public function store(Request $request){
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'link'              => 'required',
            'nameaccount'       => 'required',
            'namemediasocial'   => 'required'
        ]);

        $datamedsos_store = [
            'link'              => $request->link,
            'nameaccount'       => $request->nameaccount,
            'namemediasocial'   => $request->namemediasocial
        ];

        //upload foto
        $datamedsos_store['photo'] = $request->file('photo')->store('imgmediasosial', 'public');

        MediaSosial::create($datamedsos_store);

        return redirect('/adminpanel/mediasosial');
    }

    public function destroy($id){
        $datamedia = MediaSosial::find($id);

        if ($datamedia != null){
            Storage::disk('public')->delete($datamedia->photo);
            $datamedia->delete();
        }

        return redirect('/adminpanel/about');
    }

    public function show($id){
        //cari ke tabel kelas di database sesuai atau berdasarkan id kelas ada atau tidak
        $datamediasosial = MediaSosial::find($id);

        //cek apakah datanya ada atau tidak
        if($datamediasosial == null){
            return redirect('/adminpanel/mediasosial');
        }

        //kembalikan kelas ke halaman show dan kembalikan data user yang di ambil

        return view('page.backend.mediasosial.show', compact('datamediasosial'));
    }

    public function edit($id){
        //siapkan data atau panggil kelas
        $mediasosial = MediaSosial::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $datamediasosial = MediaSosial::find($id);

        //cek apakah datanya ada atau tidak
        if($datamediasosial == null){
            return redirect('/adminpanel/about');
        }

        return view('page.backend.mediasosial.edit', compact('mediasosial', 'datamediasosial'));

    }

    public function update(Request $request, $id){
        //validasi data
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'link'              => 'required',
            'nameaccount'       => 'required',
            'namemediasocial'   => 'required'
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $datamedia = MediaSosial::find($id);

        //siapkan data yang akan disiampan sebagai update
        $datamedsos_update = [
            'link'              => $request->link,
            'nameaccount'       => $request->nameaccount,
            'namemediasocial'   => $request->namemediasocial
        ];

        if ($request->hasFile('photo')){
            //hapus file gambar sebelumnya
            Storage::disk('public')->delete($datamedia->photo);

            //upload gambar
            $datamedsos_update['photo'] = $request->file('photo')->store('imgmediasosial', 'public');
        }

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $datamedia->update($datamedsos_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/mediasosial');
    }
}
