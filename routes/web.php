<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts/{post}', function($post){
//     $posts = [
//         "post1" => "My first blog post",
//         "post2" => "My second blog post",
//         "post3" => "My third blog post"
//     ];

//     if (!array_key_exists($post, $posts)) {
//         abort(404, 'Sorry, that post was not found');
//     }

//     return view('post',
//     ['post'=> $posts[$post]
//     ]);
// });

Route::get('/posts/{post}', [PostsController::class, 'show']);
