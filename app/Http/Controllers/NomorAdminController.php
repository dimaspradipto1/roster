<?php

namespace App\Http\Controllers;

use App\DataTables\NomorAdminDataTable;
use App\Http\Requests\NomorAdminRequest;
use App\Models\NomorAdmin;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NomorAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NomorAdminDataTable $dataTable)
    {
        return $dataTable->render('pages.nomoradmin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.nomoradmin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NomorAdminRequest $request): RedirectResponse
    {
        NomorAdmin::create([
            'nama_admin' => $request->nama_admin,
            'no_wa' => $request->no_wa,
        ]);

        return to_route('nomoradmin.index')
            ->with('success', 'Nomor admin berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NomorAdmin $nomoradmin)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NomorAdmin $nomoradmin): View
    {
        return view('pages.nomoradmin.edit', compact('nomoradmin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NomorAdminRequest $request, NomorAdmin $nomoradmin): RedirectResponse
    {
        $nomoradmin->update([
            'nama_admin' => $request->nama_admin,
            'no_wa' => $request->no_wa,
        ]);

        return to_route('nomoradmin.index')
            ->with('success', 'Nomor admin berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NomorAdmin $nomoradmin): RedirectResponse
    {
        $nomoradmin->delete();

        return to_route('nomoradmin.index')
            ->with('success', 'Nomor admin berhasil dihapus.');
    }
}
