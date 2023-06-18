<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Favorite;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image_path',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function isFavorited($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}