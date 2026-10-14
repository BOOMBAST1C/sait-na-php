<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Связь: У одной категории может быть МНОГО текстов
     * (One-to-Many: Categories hasMany Texts)
     */
    public function texts()
    {
        return $this->hasMany(Text::class);
    }
}