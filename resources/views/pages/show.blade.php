@extends('layouts.app')

@section('title', $text->heading)

@section('content')
    <article style="max-width: 800px; margin: 0 auto;">
        <h1>{{ $text->heading }}</h1>
        
        <p style="color: #666; font-size: 14px; margin-bottom: 20px;">
            Опубликовано: {{ $text->created_at->format('d.m.Y H:i') }} | 
            Категория: {{ $text->category->name }} | 
            Автор: {{ $text->user->login }}
        </p>
        
        <div style="line-height: 1.6; font-size: 16px;">
            {!! nl2br(e($text->text)) !!}
        </div>
        
        <div style="margin-top: 30px;">
            <a href="{{ route('home') }}" style="color: #007bff;">← Вернуться к списку</a>
        </div>
    </article>
@endsection