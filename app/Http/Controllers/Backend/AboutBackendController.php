<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutBackendController extends Controller
{
    public function index()
    {
        $aboutes = About::all();
        return view('page.backend.about.index', compact('aboutes'));
    }

    public function create()
    {
        return view('page.backend.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        // Simpan file photo
        $photoPath = $request->file('photo')->store('imgabout', 'public');

        $databout_store = [
            'photo'       => $photoPath,
            'description' => $request->description,
            'is_active'   => $request->has('status') ? 'active' : 'no_active',
        ];

        About::create($databout_store);

        return redirect('/adminpanel/about')->with('success', 'Data berhasil ditambahkan');
    }


    public function destroy($id)
    {
        $databout = About::find($id);

        if ($databout) {
            Storage::disk('public')->delete($databout->photo);
            $databout->delete();
        }

        return redirect('/adminpanel/about')->with('success', 'Data berhasil dihapus');
    }

    public function show($id)
    {
        $databouts = About::find($id);

        if (!$databouts) {
            return redirect('/adminpanel/about')->with('error', 'Data tidak ditemukan');
        }

        return view('page.backend.about.show', compact('databouts'));
    }

    public function edit($id)
    {
        $databouts = About::find($id);

        if (!$databouts) {
            return redirect('/adminpanel/about')->with('error', 'Data tidak ditemukan');
        }

        return view('page.backend.about.edit', compact('databouts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ]);

        $databout = About::find($id);

        if (!$databout) {
            return redirect('/adminpanel/about')->with('error', 'Data tidak ditemukan');
        }

        $databout_update = [
            'description' => $request->description,
            'is_active'   => $request->has('status') ? 'active' : 'no_active',
        ];

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($databout->photo);
            $databout_update['photo'] = $request->file('photo')->store('imgabout', 'public');
        }

        $databout->update($databout_update);

        return redirect('/adminpanel/about')->with('success', 'Data berhasil diperbarui');
    }


    public function toggleActive(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $about->is_active = $request->is_active == 1 ? 'active' : 'no_active';
        $about->save();

        return response()->json([
            'success'   => true,
            'is_active' => $about->is_active
        ]);
    }
}
