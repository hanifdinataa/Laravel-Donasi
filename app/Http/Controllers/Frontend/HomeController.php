<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Campaign;

class HomeController extends Controller
{
    public function index()
    {
        $banners = [
            '/images/banner1.jpg',
            '/images/banner2.jpg',
            '/images/banner3.jpg'
        ];

        return view('frontend.home', [
            'categories' => Category::orderBy('priority')->get(),

            // hanya tampilkan campaign ACTIVE
            'campaigns'  => Campaign::where('status', 'active')
                                    ->orderBy('created_at', 'desc')
                                    ->get(),

            'banners'    => $banners,
        ]);
    }

    public function search()
    {
        $keyword = request('q');

        $results = Campaign::where('status', 'active')  // filter active
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                      ->orWhere('description', 'like', "%{$keyword}%");
            })
            ->limit(20)
            ->get();

        return response()->json($results);
    }
}
