<?php

namespace App\Http\Controllers;

use App\Models\Text;

class HomeController extends Controller
{
public function index()
{
    $texts = Text::with(['user', 'category'])
        ->where('is_published', true)
        ->orderBy('created_at', 'desc')
        ->get(); // Было paginate(5), стало get()
    
    return view('pages.home', compact('texts'));
}
    public function show($id)
{
    $text = Text::with(['user', 'category'])->findOrFail($id);
    return view('pages.show', compact('text'));
}
}