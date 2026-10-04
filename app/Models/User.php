<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Поля, которые можно заполнять массово
     */
    protected $fillable = [
        'login',
        'password',
    ];

    /**
     * Поля, которые нужно скрывать при преобразовании в массив
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Приведение типов
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed', // Laravel сам будет хешировать пароль при сохранении!
        ];
    }
}