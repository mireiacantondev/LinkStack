<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Link;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->categories()->orderBy('name')->get();
        $links = auth()->user()->links()->with('category')->latest()->get();

        return view('dashboard', compact('categories', 'links'));
    }
}