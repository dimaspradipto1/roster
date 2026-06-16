<?php

namespace App\Http\Controllers;

use App\DataTables\ProductImageDataTable;
use App\Http\Requests\ProductImageRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductImageController extends Controller
{
    public function index(ProductImageDataTable $dataTable)
    {
        return $dataTable->render('pages.product-image.index');
    }

    public function create(): View
    {
        $products = Product::all();
        return view('pages.product-image.create', compact('products'));
    }

    public function store(ProductImageRequest $request): RedirectResponse
    {
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('product', 'public');
                ProductGallery::create([
                    'product_id' => $request->product_id,
                    'url' => $path,
                ]);
            }
        }

        return redirect()
            ->route('product-image.index')
            ->with('success', 'Gambar produk berhasil ditambahkan.');
    }

    public function edit($id): View
    {
        $image = ProductGallery::findOrFail($id);
        $products = Product::all();
        return view('pages.product-image.edit', compact('image', 'products'));
    }

    public function update(ProductImageRequest $request, $id): RedirectResponse
    {
        $image = ProductGallery::findOrFail($id);
        $path = $image->url;

        if ($request->hasFile('foto')) {
            if ($image->url && Storage::disk('public')->exists($image->url)) {
                Storage::disk('public')->delete($image->url);
            }
            $path = $request->file('foto')->store('product', 'public');
        }

        $image->update([
            'product_id' => $request->product_id,
            'url' => $path,
        ]);

        return redirect()
            ->route('product-image.index')
            ->with('success', 'Gambar produk berhasil diperbarui.');
    }

    public function destroy($id): RedirectResponse
    {
        $image = ProductGallery::findOrFail($id);

        if ($image->url && Storage::disk('public')->exists($image->url)) {
            Storage::disk('public')->delete($image->url);
        }

        $image->delete();

        return redirect()
            ->route('product-image.index')
            ->with('success', 'Gambar produk berhasil dihapus.');
    }
}
