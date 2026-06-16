<?php

namespace App\Http\Controllers;

use App\DataTables\BookingDataTable;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Product;
use App\Models\NomorAdmin;
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
        $admins = NomorAdmin::all();
        return view('pages.booking.create', compact('products', 'admins'));
    }

    public function store(BookingRequest $request): RedirectResponse
    {
        Booking::create([
            'product_id'     => $request->product_id,
            'nomor_admin_id' => $request->nomor_admin_id,
            'nama'           => $request->nama,
            'no_wa'          => $request->no_wa,
        ]);

        return to_route('booking.index')
            ->with('success', 'Booking berhasil disimpan. WhatsApp Admin sudah dibuka.');
    }

    public function edit(Booking $booking): View
    {
        $products = Product::all();
        $admins = NomorAdmin::all();
        return view('pages.booking.edit', compact('booking', 'products', 'admins'));
    }

    public function update(BookingRequest $request, Booking $booking): RedirectResponse
    {
        $booking->update([
            'product_id' => $request->product_id,
            'nomor_admin_id' => $request->nomor_admin_id,
            'nama' => $request->nama,
            'no_wa' => $request->no_wa,
        ]);

        return to_route('booking.index')
            ->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();

        return to_route('booking.index')
            ->with('success', 'Booking berhasil dihapus.');
    }
}
