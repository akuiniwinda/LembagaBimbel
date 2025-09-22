<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceBackendController extends Controller
{
    public function index(){
        $servics = Service::all();
        return view('page.backend.service.index', compact('servics'));
    }

    public function create(){
        $servics = Service::all();
        return view('page.backend.service.create', compact('servics'));
    }

    public function store(Request $request){
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'description'       => 'required',
            'title'             => 'required',
        ]);

        $dataservice_store = [
            'description'       => $request->description,
            'title'             => $request->title
        ];

        //upload foto
        $dataservice_store['photo'] = $request->file('photo')->store('imgservice', 'public');

        Service::create($dataservice_store);

        return redirect('/adminpanel/service');
    }

    public function destroy($id){
        $dataservis = Service::find($id);

        if ($dataservis != null){
            Storage::disk('public')->delete($dataservis->photo);
            $dataservis->delete();
        }

        return redirect('/adminpanel/service');
    }

    public function show($id){
        //cari ke tabel kelas di database sesuai atau berdasarkan id kelas ada atau tidak
        $dataservises = Service::find($id);

        //cek apakah datanya ada atau tidak
        if($dataservises == null){
            return redirect('/adminpanel/service');
        }

        //kembalikan kelas ke halaman show dan kembalikan data user yang di ambil

        return view('page.backend.service.show', compact('servises'));
    }

    public function edit($id){
        //siapkan data atau panggil kelas
        $servises = Service::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $dataservises = Service::find($id);

        //cek apakah datanya ada atau tidak
        if($dataservises == null){
            return redirect('/adminpanel/service');
        }

        return view('page.backend.service.edit', compact('servises', 'dataservises'));

    }

    public function update(Request $request, $id){
        //validasi data
        $request->validate([
            'photo'             => 'required |image|mimes:jpeg,png,jpg,gif',
            'description'       => 'required',
            'title'             => 'required',
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $dataservis = Service::find($id);

        //siapkan data yang akan disiampan sebagai update
        $dataservice_update = [
            'description'      => $request->description,
            'title'            => $request->title
        ];

        if ($request->hasFile('photo')){
            //hapus file gambar sebelumnya
            Storage::disk('public')->delete($dataservis->photo);

            //upload gambar
            $dataservice_update['photo'] = $request->file('photo')->store('imgservice', 'public');
        }

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $dataservis->update($dataservice_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/service');
    }

    public function toggleActive(Request $request, $id){
        $service = Service::findOrFail($id);
        $service->is_active = $request->status == 1 ? 'active' : 'inactive';
        $service->save();

        return response()->json([
            'success'   => true,
            'is_active' => $service->is_active
        ]);
    }
}
