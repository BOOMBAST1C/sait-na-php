@extends('layouts.app')

@section('title', 'Админ-панель')

@section('content')
    <h2>Панель администратора</h2>
    <hr>

    @if (session('success'))
        <div style="background: #d4edda; border: 1px solid #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 4px; color: #155724;">
            {{ session('success') }}
        </div>
    @endif

    <h3>Управление статьями</h3>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead>
            <tr style="background: #f4f4f4;">
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">ID</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Заголовок</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Автор</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Категория</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Статус</th>
                <th style="border: 1px solid #ddd; padding: 10px; text-align: left;">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $article->id }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $article->title }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $article->author }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $article->category }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">
                        @if ($article->is_published)
                            <span style="color: green;">✓ Опубликовано</span>
                        @else
                            <span style="color: orange;">⏳ Черновик</span>
                        @endif
                    </td>
                    <td style="border: 1px solid #ddd; padding: 10px;">
                        <a href="#" style="color: #007bff; margin-right: 10px;">Редактировать</a>
                        <form action="{{ route('admin.destroy', $article->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; padding: 0;" 
                                    onclick="return confirm('Удалить статью?')">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="border: 1px solid #ddd; padding: 10px; text-align: center; color: #666;">
                        Нет статей для отображения
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($articles->hasPages())
        <div style="margin-top: 30px;">
            {{ $articles->links() }}
        </div>
    @endif

    <h3>Управление ролями пользователей</h3>
    <form action="#" method="POST" style="max-width: 600px;">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="user" style="display: block; margin-bottom: 5px; font-weight: bold;">Пользователь:</label>
            <select id="user" name="user" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="1">Иван Петров (Журналист)</option>
                <option value="2">Анна Сидорова (Журналист)</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="role" style="display: block; margin-bottom: 5px; font-weight: bold;">Новая роль:</label>
            <select id="role" name="role" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="journalist">Журналист</option>
                <option value="admin">Администратор</option>
                <option value="user">Пользователь</option>
            </select>
        </div>

        <button type="submit" style="background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
            Изменить роль
        </button>
    </form>
@endsection