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

    <h3>Управление ролями пользователей</h3>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead>
            <tr style="background: #f4f4f4;">
                <th style="border: 1px solid #ddd; padding: 10px;">ID</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Логин</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Текущая роль</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $user->id }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $user->login }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">
                        {{ $user->role ? $user->role->name : 'Без роли' }}
                    </td>
                    <td style="border: 1px solid #ddd; padding: 10px;">
                        <form action="{{ route('admin.assignRole', $user->id) }}" method="POST" style="display: flex; gap: 10px;">
                            @csrf
                            <select name="role_id" style="padding: 5px; border: 1px solid #ddd; border-radius: 4px;">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" style="background: #28a745; color: white; padding: 5px 15px; border: none; border-radius: 4px; cursor: pointer;">
                                Назначить
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Управление статьями</h3>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead>
            <tr style="background: #f4f4f4;">
                <th style="border: 1px solid #ddd; padding: 10px;">ID</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Заголовок</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Автор</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Категория</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($texts as $text)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $text->id }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $text->heading }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $text->user->login }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">{{ $text->category->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">
                        <form action="{{ route('admin.destroy', $text->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer;" 
                                    onclick="return confirm('Удалить статью?')">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="border: 1px solid #ddd; padding: 10px; text-align: center;">Нет статей</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    

@endsection