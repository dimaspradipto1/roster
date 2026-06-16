<?php

namespace App\Http\Controllers;

use App\DataTables\BookingDataTable;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(BookingDataTable $dataTable)
    {
        return $dataTable->render('pages.booking.index');
    }

    public function create(): View
    {
        $products = Product::all();
        return view('pages.booking.create', compact('products'));
    }

    public function store(BookingRequest $request): RedirectResponse
    {
        $booking = Booking::create([
            'product_id' => $request->product_id,
            'nama' => $request->nama,
            'no_wa' => $request->no_wa,
        ]);

        $product = Product::find($request->product_id);
        $prodName = $product ? $product->nama_produk : 'Produk Roster';
        $prodCode = $product ? $product->kode_produk : '-';
        
        // Ambil nomor WA admin dari data Kontak
        $contact = Contact::first();
        $adminPhone = $contact && $contact->no_wa ? $contact->no_wa : '628123456789';
        $adminPhone = preg_replace('/[^0-9]/', '', $adminPhone);
        if (strpos($adminPhone, '0') === 0) {
            $adminPhone = '62' . substr($adminPhone, 1);
        }

        $message = "Halo Admin Roster, saya ingin melakukan booking untuk produk *" . $prodName . "* (Kode: " . $prodCode . ") atas nama *" . $booking->nama . "*. Nomor WhatsApp saya: " . $booking->no_wa;
        $waUrl = "https://wa.me/" . $adminPhone . "?text=" . urlencode($message);

        return redirect()->away($waUrl);
    }

    public function edit(Booking $booking): View
    {
        $products = Product::all();
        return view('pages.booking.edit', compact('booking', 'products'));
    }

    public function update(BookingRequest $request, Booking $booking): RedirectResponse
    {
        $booking->update([
            'product_id' => $request->product_id,
            'nama' => $request->nama,
            'no_wa' => $request->no_wa,
        ]);

        return redirect()
            ->route('booking.index')
            ->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();

        return redirect()
            ->route('booking.index')
            ->with('success', 'Booking berhasil dihapus.');
    }
}
