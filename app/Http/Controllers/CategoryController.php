<?php

namespace App\Http\Controllers;

use App\Models\Article;

class CategoryController extends Controller
{
    /**
     * Страница категории - вывод статей одной категории (пока только IT)
     */
    public function index()
    {
        // Фильтруем статьи по категории "IT" и только опубликованные
        $articles = Article::where('category', 'IT')
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        
        return view('pages.category', compact('articles'));
    }
}