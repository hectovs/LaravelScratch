<?php

namespace App\Http\Controllers;

use App\models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{   
    public function index()
    {
    $articles = Article::latest()->get();

    return view('articles.index', ['articles' => $articles]);

    }
    public function show($id)
    {
    $article = Article::find($id);

    return view('articles.show', ['article' => $article]);

    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $article = new Article();

        $article->title = request("title");
        $article->Excerpt = request("Excerpt");
        $article->Body = request("Body");

        $article->save();

        return redirect("/articles");

    }

    public function edit($id)
    {
        $article = Article::find($id);
        
        
        return view('articles.edit', compact('article'));
    }

    public function update($id)
    {
        $article = Article::find($id);

        $article->title = request("title");
        $article->Excerpt = request("Excerpt");
        $article->Body = request("Body");

        $article->save();
        
        
        return redirect('/articles/'.$article->id);
    }
}
