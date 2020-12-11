<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $fillable=['title', 'excerpt', 'body'];

    public function path()
    {
        return route('articles.show', $this);
    }

    public function user(Type $var = null)
    {
        # code...
    }
}
