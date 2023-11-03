<?php

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    // Mass assignment
    protected $fillable = [
        "title",
        "body",
        "likes_counter"
    ];

    // Default values (created_at not necessary cause of eloquent)
    protected $attributes = [
        "likes_counter" => 0,
    ];
}

;?>