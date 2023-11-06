<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUser extends Model
{
    use HasFactory;

    /**
     * Name convention for attach()
     * 
     * @var string
     */
    protected $table = "post_user";

    public $timestamps = false;
}
