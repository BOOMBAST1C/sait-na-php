<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class JournalistController extends Controller
{
    /**
     * Показать форму создания статьи
     */
    public function create()
    {
        return view('pages.journalist');
    }

    /**
     * Сохранить новую статью в базу данных
     */
    public function store(Request $request)
    {
        // Валидация данных формы
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'content' => 'required',
            'author' => 'required|max:100',
        ]);

        // Создаем статью в базе данных
        Article::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'content' => $validated['content'],
            'author' => $validated['author'],
            'is_published' => $request->has('is_published'),
        ]);

        // Перенаправляем на главную с сообщением об успехе
        return redirect()->route('home')->with('success', 'Статья успешно опубликована!');
    }
}