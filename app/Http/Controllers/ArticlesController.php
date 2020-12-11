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
    public function show(Article $article)
    {
    

    return view('articles.show', ['article' => $article]);

    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $article = new Article();

        request()->validate([
            "title" =>'required',
            "Excerpt" =>'required',
            "Body" =>'required'
        ]);

        $article->title = request("title");
        $article->Excerpt = request("Excerpt");
        $article->Body = request("Body");

        $article->save();

        return redirect("/articles");

    }

    public function edit(Article $article)
    {
        
        
        
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        

        request()->validate([
            "title" =>'required',
            "Excerpt" =>'required',
            "Body" =>'required'
        ]);

        $article->title = request("title");
        $article->Excerpt = request("Excerpt");
        $article->Body = request("Body");

        $article->save();
        
        
        return redirect('/articles/'.$article->id);
    }
}
