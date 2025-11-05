<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content'];
    protected $casts = [
    'title' => 'array',
    'content' => 'array',
];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

