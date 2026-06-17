<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function homepage()
    {
        return view('layouts.frontend.homepage');
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
        return view('layouts.frontend.testimoni');
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
