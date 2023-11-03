<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Mass assignment

    /**
     *
     * @var array<string>
     */
    protected $fillable = [
        "title",
        "body",
        "likes_counter"
    ];

    // Default values (created_at not necessary cause of eloquent)

    /**
     * 
     * @var array<string, int>
     */
    protected $attributes = [
        "likes_counter" => 0,
    ];
}

; ?>