<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    use HasFactory;

    protected $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey; 
    }

    public function handle()
    {
        die('it works');
    }
}
