@extends('layouts.app')

@section('title', 'Журналист - Добавить статью')

@section('content')
    <h2>Панель журналиста</h2>
    <p>Создание новой статьи</p>
    <hr>

    @if ($errors->any())
        <div style="background: #fee; border: 1px solid #fcc; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
            <h4 style="color: #c00; margin: 0 0 10px 0;">Исправьте ошибки:</h4>
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li style="color: #c00;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('journalist.store') }}" method="POST" style="max-width: 800px;">
        @csrf 

        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; margin-bottom: 5px; font-weight: bold;">Заголовок статьи:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" 
                   placeholder="Введите заголовок" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="category" style="display: block; margin-bottom: 5px; font-weight: bold;">Категория:</label>
            <select id="category" name="category" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
                <option value="IT" {{ old('category') == 'IT' ? 'selected' : '' }}>IT</option>
                <option value="Медицина" {{ old('category') == 'Медицина' ? 'selected' : '' }}>Медицина</option>
                <option value="Космос" {{ old('category') == 'Космос' ? 'selected' : '' }}>Космос</option>
                <option value="Наука" {{ old('category') == 'Наука' ? 'selected' : '' }}>Наука</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="author" style="display: block; margin-bottom: 5px; font-weight: bold;">Автор:</label>
            <input type="text" id="author" name="author" value="{{ old('author', 'Журналист') }}" 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" 
                   placeholder="Ваше имя" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="content" style="display: block; margin-bottom: 5px; font-weight: bold;">Текст статьи:</label>
            <textarea id="content" name="content" rows="10" 
                      style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" 
                      placeholder="Введите текст статьи" required>{{ old('content') }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="is_published" value="1" checked 
                       style="margin-right: 10px; width: 18px; height: 18px;">
                <span>Опубликовать сразу</span>
            </label>
        </div>
        <div>
            <button type="submit" style="background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                Опубликовать
            </button>
            <button type="reset" style="background: #6c757d; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-left: 10px;">
                Очистить
            </button>
        </div>
    </form>
@endsection