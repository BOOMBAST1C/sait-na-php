@extends('layouts.app')

@section('title', 'Категория IT - Новостной сайт')

@section('content')
    <h2>Категория: Информационные технологии</h2>
    <p style="color: #666;">Новости из мира IT и технологий</p>
    <hr>

    @forelse ($texts as $text)
        <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            <h3><a href="#">{{ $text->heading }}</a></h3>
            <p style="color: #666; font-size: 14px;">
                Опубликовано: {{ $text->created_at->format('d.m.Y H:i') }} | 
                Автор: {{ $text->user->login }}
            </p>
            <p>{{ Str::limit($text->text, 200) }}</p>
            <a href="#" style="color: #007bff;">Читать далее →</a>
        </div>
    @empty
        <p style="color: #666; padding: 20px; text-align: center;">
            В этой категории пока нет статей.
        </p>
    @endforelse
@endsection