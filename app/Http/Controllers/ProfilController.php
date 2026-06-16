<?php

namespace App\Http\Controllers;

use App\DataTables\ProfilDataTable;
use App\Http\Requests\ProfilRequest;
use App\Models\Profil;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function index(ProfilDataTable $dataTable)
    {
        return $dataTable->render('pages.profil.index');
    }

    public function create(): View
    {
        return view('pages.profil.create');
    }

    public function store(ProfilRequest $request): RedirectResponse
    {
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('profil', 'public');
        }

        Profil::create([
            'logo' => $logoPath,
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_pemilik' => $request->nama_pemilik,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil berhasil ditambahkan.');
    }

    public function edit(Profil $profil): View
    {
        return view('pages.profil.edit', compact('profil'));
    }

    public function update(ProfilRequest $request, Profil $profil): RedirectResponse
    {
        $logoPath = $profil->logo;
        if ($request->hasFile('logo')) {
            if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
                Storage::disk('public')->delete($profil->logo);
            }
            $logoPath = $request->file('logo')->store('profil', 'public');
        }

        $profil->update([
            'logo' => $logoPath,
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_pemilik' => $request->nama_pemilik,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(Profil $profil): RedirectResponse
    {
        if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
            Storage::disk('public')->delete($profil->logo);
        }

        $profil->delete();

        return redirect()
            ->route('profil.index')
            ->with('success', 'Profil berhasil dihapus.');
    }
}
