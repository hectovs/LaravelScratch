<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(Example $example)
    {
        ddd(resolve('App\Models\Example'),resolve('App\Models\Example'));
    }
}
