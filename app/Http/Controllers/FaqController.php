<?php

namespace App\Http\Controllers;

use App\DataTables\FaqDataTable;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(FaqDataTable $dataTable)
    {
        return $dataTable->render('pages.faq.index');
    }

    public function create(): View
    {
        return view('pages.faq.create');
    }

    public function store(FaqRequest $request): RedirectResponse
    {
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'category' => $request->category,
        ]);

        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq): View
    {
        return view('pages.faq.edit', compact('faq'));
    }

    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'category' => $request->category,
        ]);

        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }
}
