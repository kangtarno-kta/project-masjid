<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $berita = Berita::query()
            ->where('status', 'published')
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('berita'));
    }
}
