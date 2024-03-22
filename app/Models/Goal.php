<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goal extends Model
{
    use HasFactory;

    // Указываем, что эта модель связана с таблицей goals
    protected $table = 'goals';

    // Добавляем отношение к пользователю - каждая цель принадлежит одному пользователю
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
