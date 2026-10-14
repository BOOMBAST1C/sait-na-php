@extends('layouts.app')

@section('title', 'Главная - Новостной сайт')

@section('content')
    <h2>Последние новости</h2>
    
    @if (session('success'))
        <div style="background: #d4edda; border: 1px solid #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 4px; color: #155724;">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($texts as $text)
        <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            <h3><a href="#">{{ $text->heading }}</a></h3>
            <p style="color: #666; font-size: 14px;">
                Опубликовано: {{ $text->created_at->format('d.m.Y H:i') }} | 
                Категория: {{ $text->category->name }} | 
                Автор: {{ $text->user->login }}
            </p>
            <p>{{ Str::limit($text->text, 200) }}</p>
            <a href="{{ route('text.show', $text->id) }}" style="color: #007bff;">Читать далее →</a>
        </div>
    @empty
        <p style="color: #666; padding: 20px; text-align: center;">
            На сайте пока нет новостей.
        </p>
    @endforelse
@endsection