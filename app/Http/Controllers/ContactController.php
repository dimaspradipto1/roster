<?php

namespace App\Http\Controllers;

use App\DataTables\ContactDataTable;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(ContactDataTable $dataTable)
    {
        return $dataTable->render('pages.contact.index');
    }

    public function create(): View
    {
        return view('pages.contact.create');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        Contact::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'map' => $request->map,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('contact.index')
            ->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit(Contact $contact): View
    {
        return view('pages.contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'map' => $request->map,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('contact.index')
            ->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()
            ->route('contact.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}
