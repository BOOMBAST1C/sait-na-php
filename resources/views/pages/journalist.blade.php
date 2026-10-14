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
            <label for="heading" style="display: block; margin-bottom: 5px; font-weight: bold;">Заголовок статьи:</label>
            <input type="text" id="heading" name="heading" value="{{ old('heading') }}" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="category_id" style="display: block; margin-bottom: 5px; font-weight: bold;">Категория:</label>
            <select id="category_id" name="category_id" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="">Выберите категорию</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="text" style="display: block; margin-bottom: 5px; font-weight: bold;">Текст статьи:</label>
            <textarea id="text" name="text" rows="10" required 
                      style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">{{ old('text') }}</textarea>
        </div>

        <div>
            <button type="submit" style="background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                Опубликовать
            </button>
        </div>
    </form>
@endsection