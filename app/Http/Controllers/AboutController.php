<?php

namespace App\Http\Controllers;

use App\DataTables\AboutDataTable;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(AboutDataTable $dataTable)
    {
        return $dataTable->render('pages.about.index');
    }

    public function create(): View
    {
        return view('pages.about.create');
    }

    public function store(AboutRequest $request): RedirectResponse
    {
        About::create($request->validated());

        return redirect()
            ->route('about.index')
            ->with('success', 'Data Tentang Kami berhasil ditambahkan.');
    }

    public function edit(About $about): View
    {
        return view('pages.about.edit', compact('about'));
    }

    public function update(AboutRequest $request, About $about): RedirectResponse
    {
        $about->update($request->validated());

        return redirect()
            ->route('about.index')
            ->with('success', 'Data Tentang Kami berhasil diperbarui.');
    }

    public function destroy(About $about): RedirectResponse
    {
        $about->delete();

        return redirect()
            ->route('about.index')
            ->with('success', 'Data Tentang Kami berhasil dihapus.');
    }
}
