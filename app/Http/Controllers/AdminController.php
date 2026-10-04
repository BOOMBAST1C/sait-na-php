<?php

namespace App\Http\Controllers;

use App\Models\Article;

class AdminController extends Controller
{
    /**
     * Показать панель администратора со списком всех статей
     */
    public function index()
    {
        // Получаем все статьи (включая неопубликованные), по 10 на страницу
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        
        return view('pages.admin', compact('articles'));
    }

    /**
     * Удалить статью по ID
     */
    public function destroy($id)
    {
        // Находим статью или выбрасываем ошибку 404
        $article = Article::findOrFail($id);
        
        // Удаляем статью
        $article->delete();
        
        // Перенаправляем обратно в админку с сообщением
        return redirect()->route('admin')->with('success', 'Статья удалена!');
    }
}