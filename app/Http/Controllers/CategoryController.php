<?php

namespace App\Http\Controllers;

use App\Models\Text;

class CategoryController extends Controller
{
public function index()
{
    $texts = Text::with(['user', 'category'])
        ->whereHas('category', function($query) {
            $query->where('name', 'IT');
        })
        ->where('is_published', true)
        ->orderBy('created_at', 'desc')
        ->get(); // Было paginate(5), стало get()
        
    return view('pages.category', compact('texts'));
}
}