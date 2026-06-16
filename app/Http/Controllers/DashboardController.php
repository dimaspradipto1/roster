<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Booking;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalBookings = Booking::count();
        $totalNews = News::count();
        $totalCategories = Category::count();

        // Data chart booking per hari
        $bookingsChart = Booking::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->take(10)
            ->get();

        // Data chart produk per kategori
        $categoriesChart = Category::withCount('products')->get();

        // Booking terbaru
        $latestBookings = Booking::with(['product', 'nomorAdmin'])->latest()->take(5)->get();

        return view('layouts.dashboard.index', compact(
            'totalProducts',
            'totalBookings',
            'totalNews',
            'totalCategories',
            'bookingsChart',
            'categoriesChart',
            'latestBookings'
        ));
    }
}
