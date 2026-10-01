<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index()
    {
        $articles = Article::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('pages.home', compact('articles'));
    }

    public function category()
    {
        $articles = Article::where('category', 'IT')
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('pages.category', compact('articles'));
    }

    public function journalist()
    {
        return view('pages.journalist');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'content' => 'required',
            'author' => 'required|max:100',
        ]);

        Article::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'content' => $validated['content'],
            'author' => $validated['author'],
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('home')->with('success', 'Статья успешно опубликована!');
    }

    public function admin()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin', compact('articles'));
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        
        return redirect()->route('admin')->with('success', 'Статья удалена!');
    }
}