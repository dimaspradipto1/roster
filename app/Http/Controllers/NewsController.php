<?php

namespace App\Http\Controllers;

use App\DataTables\NewsDataTable;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(NewsDataTable $dataTable)
    {
        return $dataTable->render('pages.news.index');
    }

    public function create(): View
    {
        return view('pages.news.create');
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('news', 'public');
        }

        News::create([
            'user_id' => Auth::id(),
            'thumbnail' => $thumbnailPath,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('news.index')
            ->with('success', 'Berita berhasil diterbitkan.');
    }

    public function edit(News $news): View
    {
        return view('pages.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $thumbnailPath = $news->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
                Storage::disk('public')->delete($news->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('news', 'public');
        }

        $news->update([
            'thumbnail' => $thumbnailPath,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news): RedirectResponse
    {
        if ($news->thumbnail && Storage::disk('public')->exists($news->thumbnail)) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
