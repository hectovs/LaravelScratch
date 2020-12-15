<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Auth\RequestGuard;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Cache;
use Illuminate\Filesystem\Filesystem;

class PagesController extends Controller
{
    public function home()
    {
        
        Cache::remember('foo', 60, fn()=> 'foobar');

        return Cache::get('foo'); 
    }
}
