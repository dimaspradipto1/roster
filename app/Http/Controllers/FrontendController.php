<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        $banners      = \App\Models\Banner::where('aktif', true)->orderBy('urutan')->get();
        $features     = \App\Models\Feature::orderBy('urutan')->get();
        $testimonials = \App\Models\Testimonial::where('aktif', true)->orderByDesc('id')->take(6)->get();
        return view('layouts.frontend.homepage', compact('banners', 'features', 'testimonials'));
    }

    public function produk()
    {
        $categories = \App\Models\Category::all();
        $products = \App\Models\Product::with(['category', 'galleries'])->get();
        return view('layouts.frontend.product', compact('products', 'categories'));
    }

    public function galeri()
    {
        return view('layouts.frontend.homepage');
    }

    public function tentang()
    {
        $about      = \App\Models\About::first();
        $milestones = \App\Models\Milestone::orderBy('tahun')->get();
        return view('layouts.frontend.about', compact('about', 'milestones'));
    }

    public function testimoni()
    {
        $testimonials = \App\Models\Testimonial::where('aktif', true)->orderByDesc('id')->get();
        return view('layouts.frontend.testimoni', compact('testimonials'));
    }

    /**
     * Menyimpan testimoni yang diajukan oleh pengguna/publik.
     */
    public function storeTestimonial(\App\Http\Requests\TestimonialRequest $request)
    {
        \App\Models\Testimonial::create([
            'nama'      => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'kategori'  => $request->kategori,
            'bintang'   => $request->bintang,
            'pesan'     => $request->pesan,
            'aktif'     => false, // Default pending (butuh moderasi admin)
        ]);

        alert()->success('Terima Kasih!', 'Ulasan Anda berhasil dikirim dan akan segera diproses oleh admin.');

        return redirect()->back();
    }

    public function faq()
    {
        $faqs = \App\Models\Faq::all();
        return view('layouts.frontend.faq', compact('faqs'));
    }

    public function kontak()
    {
        return view('layouts.frontend.contact');
    }
}
