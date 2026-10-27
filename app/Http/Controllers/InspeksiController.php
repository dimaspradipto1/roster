<?php

namespace App\Http\Controllers;

use App\DataTables\InspeksiDataTable;
use App\Http\Requests\InspeksiRequest;
use App\Models\Inspeksi;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class InspeksiController extends Controller
{
    /**
     * Tampilkan daftar inspeksi via DataTables.
     */
    public function index(InspeksiDataTable $dataTable)
    {
        $today = Carbon::today();
        $in30Days = Carbon::today()->addDays(30);

        // Statistik ringkas untuk widget card di atas tabel
        $stats = [
            'total'          => Inspeksi::count(),
            'aktif'          => Inspeksi::where('tanggal_expired', '>', $in30Days)->count(),
            'segera_expired' => Inspeksi::whereBetween('tanggal_expired', [$today, $in30Days])->count(),
            'expired'        => Inspeksi::where('tanggal_expired', '<', $today)->count(),
        ];

        return $dataTable->render('pages.inspeksi.index', compact('stats'));
    }

    /**
     * Tampilkan form tambah inspeksi.
     */
    public function create(): View
    {
        return view('pages.inspeksi.create');
    }

    /**
     * Simpan data inspeksi baru ke database.
     */
    public function store(InspeksiRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('file_laporan')) {
            $data['file_laporan'] = $request->file('file_laporan')->store('inspeksi_files', 'public');
        }

        Inspeksi::create($data);

        alert()->success('Berhasil!', 'Data inspeksi berhasil ditambahkan.');

        return redirect()->route('inspeksi.index');
    }

    /**
     * Tampilkan detail data inspeksi.
     */
    public function show(Inspeksi $inspeksi): View
    {
        return view('pages.inspeksi.show', compact('inspeksi'));
    }

    /**
     * Tampilkan form edit inspeksi.
     */
    public function edit(Inspeksi $inspeksi): View
    {
        return view('pages.inspeksi.edit', compact('inspeksi'));
    }

    /**
     * Update data inspeksi di database.
     */
    public function update(InspeksiRequest $request, Inspeksi $inspeksi): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('file_laporan')) {
            // Hapus file lama jika ada
            if ($inspeksi->file_laporan && Storage::disk('public')->exists($inspeksi->file_laporan)) {
                Storage::disk('public')->delete($inspeksi->file_laporan);
            }
            $data['file_laporan'] = $request->file('file_laporan')->store('inspeksi_files', 'public');
        }

        $inspeksi->update($data);

        alert()->success('Berhasil!', 'Data inspeksi berhasil diperbarui.');

        return redirect()->route('inspeksi.index');
    }

    /**
     * Hapus data inspeksi dari database.
     */
    public function destroy(Inspeksi $inspeksi): RedirectResponse
    {
        if ($inspeksi->file_laporan && Storage::disk('public')->exists($inspeksi->file_laporan)) {
            Storage::disk('public')->delete($inspeksi->file_laporan);
        }

        $inspeksi->delete();

        alert()->success('Berhasil!', 'Data inspeksi berhasil dihapus.');

        return redirect()->route('inspeksi.index');
    }
}
