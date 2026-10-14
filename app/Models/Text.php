<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = [
        'heading',
        'text',
        'category_id',
        'user_id',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Связь: Текст принадлежит ОДНОМУ пользователю (автору)
     * (Many-to-One: Text belongsTo User)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Связь: Текст принадлежит ОДНОЙ категории
     * (Many-to-One: Text belongsTo Category)
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}