@extends('layouts.app')

@section('title', 'Главная - Новостной сайт')

@section('content')
    <h2>Последние новости</h2>
    @if (session('success'))
        <div style="background: #d4edda; border: 1px solid #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 4px; color: #155724;">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($articles as $article)
        <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            <h3><a href="#">{{ $article->title }}</a></h3>
            <p style="color: #666; font-size: 14px;">
                Опубликовано: {{ $article->created_at->format('d.m.Y H:i') }} | 
                Категория: {{ $article->category }} | 
                Автор: {{ $article->author }}
            </p>
            <p>{{ Str::limit($article->content, 200) }}</p>
            <a href="#" style="color: #007bff;">Читать далее →</a>
        </div>
    @empty
        <p style="color: #666; padding: 20px; text-align: center;">
            На сайте пока нет новостей. 
            <a href="{{ route('journalist') }}" style="color: #007bff;">Добавить первую статью</a>
        </p>
    @endforelse
    @if ($articles->hasPages())
        <div style="margin-top: 30px;">
            {{ $articles->links() }}
        </div>
    @endif
@endsection