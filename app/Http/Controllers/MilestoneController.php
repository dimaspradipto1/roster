<?php

namespace App\Http\Controllers;

use App\DataTables\MilestoneDataTable;
use App\Http\Requests\MilestoneRequest;
use App\Models\Milestone;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MilestoneController extends Controller
{
    public function index(MilestoneDataTable $dataTable)
    {
        return $dataTable->render('pages.milistone.index');
    }

    public function create(): View
    {
        return view('pages.milistone.create');
    }

    public function store(MilestoneRequest $request): RedirectResponse
    {
        Milestone::create($request->validated());

        return redirect()
            ->route('milestone.index')
            ->with('success', 'Milestone berhasil ditambahkan.');
    }

    public function edit(Milestone $milestone): View
    {
        return view('pages.milistone.edit', compact('milestone'));
    }

    public function update(MilestoneRequest $request, Milestone $milestone): RedirectResponse
    {
        $milestone->update($request->validated());

        return redirect()
            ->route('milestone.index')
            ->with('success', 'Milestone berhasil diperbarui.');
    }

    public function destroy(Milestone $milestone): RedirectResponse
    {
        $milestone->delete();

        return redirect()
            ->route('milestone.index')
            ->with('success', 'Milestone berhasil dihapus.');
    }
}
