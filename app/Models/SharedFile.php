<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedFile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'file_path'];

    protected $casts = [
        'title' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
