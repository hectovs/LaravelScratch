<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Example;

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

Route::get('/contact', 'App\Http\Controllers\ContactController@show');
Route::post('/contact', 'App\Http\Controllers\ContactController@store');


Route::get('/about', function () {
    
    return view('about',
    ['articles' => App\models\article::take(3)->latest()->get()

    ]);
});

Route::get('/articles', 'App\Http\Controllers\ArticlesController@index')->name('articles.index');
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::put('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');



Route::get('/pages', 'App\Http\Controllers\PagesController@home');
    



Route::get('/example', function (App\Models\Example $example) {
    // $example=resolve(App\Models\example::class);

    ddd($example);
    
});
// Route::get('/container', function ()
// {
//     $container = new \App\Models\Container();

//     $container->bind('example', function() {
//         return new \App\Models\Example(); 
//     });

//     $example = $container -> resolve('example');

//     $example->go();
// });

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
