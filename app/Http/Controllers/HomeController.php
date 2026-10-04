<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Главная страница - вывод всех опубликованных статей
     */
    public function index()
    {
        // Получаем все опубликованные статьи, сортируем от новых к старым, по 5 на страницу
        $articles = Article::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        
        // Передаем статьи в шаблон pages/home.blade.php
        return view('pages.home', compact('articles'));
    }
}