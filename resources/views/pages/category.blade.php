@extends('layouts.app')

@section('title', 'Категория IT - Новостной сайт')

@section('content')
    <h2>Категория: Информационные технологии</h2>
    <p style="color: #666;">Новости из мира IT и технологий</p>
    <hr>

    @forelse ($articles as $article)
        <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            <h3><a href="#">{{ $article->title }}</a></h3>
            <p style="color: #666; font-size: 14px;">
                Опубликовано: {{ $article->created_at->format('d.m.Y H:i') }} | 
                Автор: {{ $article->author }}
            </p>
            <p>{{ Str::limit($article->content, 200) }}</p>
            <a href="#" style="color: #007bff;">Читать далее →</a>
        </div>
    @empty
        <p style="color: #666; padding: 20px; text-align: center;">
            В этой категории пока нет статей.
        </p>
    @endforelse
    @if ($articles->hasPages())
        <div style="margin-top: 30px;">
            {{ $articles->links() }}
        </div>
    @endif
@endsection