<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryBackendController extends Controller
{
    public function index(){
        $gallerys = Gallery::all();
        return view('page.backend.gallery.index', compact('gallerys'));
    }

    public function create(){
        $gallerys = Gallery::all();
        return view('page.backend.gallery.create', compact('gallerys'));
    }

    public function store(Request $request){
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'title'             => 'required',
            'description'       => 'required'
        ]);

        $datagallery_store = [
            'title'             => $request->title,
            'description'       => $request->description
        ];

        //upload foto
        $datagallery_store['photo'] = $request->file('photo')->store('imggallery', 'public');

        Gallery::create($datagallery_store);

        return redirect('/adminpanel/gallery');
    }

    public function destroy($id){
        $datagaleri = Gallery::find($id);

        if ($datagaleri != null){
            Storage::disk('public')->delete($datagaleri->photo);
            $datagaleri->delete();
        }

        return redirect('/adminpanel/gallery');
    }

    public function show($id){
        //cari ke tabel kelas di database sesuai atau berdasarkan id kelas ada atau tidak
        $datagaleris = Gallery::find($id);

        //cek apakah datanya ada atau tidak
        if($datagaleris == null){
            return redirect('/adminpanel/gallery');
        }

        //kembalikan kelas ke halaman show dan kembalikan data user yang di ambil

        return view('page.backend.gallery.show', compact('datagaleris'));
    }

    public function edit($id){
        //siapkan data atau panggil kelas
        $galeris = Gallery::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $datagaleris = Gallery::find($id);

        //cek apakah datanya ada atau tidak
        if($datagaleris == null){
            return redirect('/adminpanel/gallery');
        }

        return view('page.backend.about.edit', compact('galeris', 'datagaleris'));

    }

    public function update(Request $request, $id){
        //validasi data
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'title'             => 'required',
            'description'       => 'required'
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $datagaleri = Gallery::find($id);

        //siapkan data yang akan disiampan sebagai update
        $datagaleri_update = [
            'title'             => $request->title,
            'description'       => $request->description
        ];

        if ($request->hasFile('photo')){
            //hapus file gambar sebelumnya
            Storage::disk('public')->delete($datagaleri->photo);

            //upload gambar
            $datagaleri_update['photo'] = $request->file('photo')->store('imggallery', 'public');
        }

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $datagaleri->update($datagaleri_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/gallery');
    }
}
