<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'login',
        'password',
        'role_id', // Добавили поле роли
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Связь: У пользователя ОДНА роль
     * (Many-to-One: User belongsTo Role)
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Связь: У пользователя МНОГО текстов (статей)
     * (One-to-Many: User hasMany Texts)
     */
    public function texts()
    {
        return $this->hasMany(Text::class);
    }

    /**
     * Удобный метод: проверка, является ли пользователь админом
     */
    public function isAdmin(): bool
    {
        return $this->role && $this->role->name === 'admin';
    }

    /**
     * Удобный метод: проверка, является ли пользователь журналистом
     */
    public function isJournalist(): bool
    {
        return $this->role && $this->role->name === 'journalist';
    }
}