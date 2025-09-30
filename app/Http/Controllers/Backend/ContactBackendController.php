<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactBackendController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('page.backend.contact.index', compact('contacts'));
    }

    public function create(){
        $contacts = Contact::all();
        return view('page.frontend.contact.index', compact('contacts'));
    }

    public function store(Request $request){
        $request->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'subject'           => 'required',
            'description'       => 'required',
        ]);

        $datacontact_store = [
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'subject'           => $request->subject,
            'description'       => $request->description
        ];


        Contact::create($datacontact_store);

        return redirect('/');
    }

    public function destroy($id){
        $datacontact = Contact::find($id);

        if ($datacontact != null){
            $datacontact->delete();
        }

        return redirect('/adminpanel/contact')->with('success', 'Terimakasih sudah mengisi form untuk mendapatkan informasi lebih lanjut tentang program bimbingan belajar kami. Tim kami akan segera menghubungi anda.');
    }

    public function show($id){
        // Cari data kontak di database berdasarkan ID
        $datacontacts = Contact::find($id); // Tetap pakai find() seperti asli
        // Cek apakah data ada (tetap seperti asli, tapi tambah message)
        if($datacontacts == null){
            return redirect('/adminpanel/contact')->with('error', 'Data kontak dengan ID ' . $id . ' tidak ditemukan!');
        }
        // Auto-mark as seen (tambahan untuk fitur "sudah dilihat dari detail")
        if (!$datacontacts->is_active) {
            $datacontacts->is_active = 1;
            $datacontacts->save();
        }
        // Kembalikan view (tetap seperti asli)
        return view('page.backend.contact.show', compact('datacontacts'));
    }

    public function edit($id){
        //siapkan data atau panggil kelas
        $kontaks = Contact::all();

        //amabil data user atau siswa di tabel user berdasar kan id
        $datacontacts = Contact::find($id);

        //cek apakah datanya ada atau tidak
        if($datacontacts == null){
            return redirect('/adminpanel/contact');
        }

        return view('page.backend.contact.edit', compact('kontaks', 'datacontacts'));

    }

    public function update(Request $request, $id){
        //validasi data
        $request->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'subject'           => 'required',
            'description'       => 'required',
        ]);

        //cari apakah ada user di tabel yang akan di update cari berdasarkan id
        $datacontacts = Contact::find($id);

        //siapkan data yang akan disiampan sebagai update
        $datacontact_update = [
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'subject'           => $request->subject,
            'description'       => $request->description
        ];

        //simpan data ke dalam base dengan data yang terbaru sesuai update
        $datacontacts->update($datacontact_update);

        //simpan data ke halaman beranda
        return redirect('/adminpanel/contact');
    }
}
