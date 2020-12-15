<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $binding = [];

    public function bind($key, $value)
    {
        $this->binding[$key] = $value;
    }

    public function resolve($key)
    {
        if (isset($this->binding[$key])) {
            return call_user_func($this->binding[$key]) ;

        }
    }
}
