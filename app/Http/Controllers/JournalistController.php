<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalistController extends Controller
{
    public function create()
    {
        // Передаем все категории из БД в форму
        $categories = Category::all(); 
        return view('pages.journalist', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|max:255',
            'text' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Text::create([
            'heading' => $validated['heading'],
            'text' => $validated['text'],
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(), // Автоматически берем ID текущего пользователя
            'is_published' => true,
        ]);

        return redirect()->route('home')->with('success', 'Статья успешно опубликована!');
    }
}