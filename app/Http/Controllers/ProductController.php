<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('pages.product.index');
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('pages.product.create', compact('categories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create([
            'category_id' => $request->category_id,
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'tebal' => $request->tebal,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()
            ->route('product.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        $categories = Category::all();
        return view('pages.product.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update([
            'category_id' => $request->category_id,
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'tebal' => $request->tebal,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()
            ->route('product.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('product.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
