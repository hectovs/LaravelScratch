<?php

namespace App\Http\Controllers;

use App\models\Article;
use App\models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{   
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstorFail()->articles;
        }
        else {
            $articles = Article::latest()->get();
        }

        

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
        

        Article::create($this->validateArticle());

        // validate() returns an array called $validatedattributes 
        //and this contains the info required to create an $article class
        
        return redirect(route('articles.index'));

    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        
        $article->update($this->validateArticle());

        // validate() returns an array called $validatedattributes 
        //and this contains the info required to update an $article class
        
        
        return redirect($article->path());
    }
    protected function validateArticle()
    {
        return request()->validate([
            "title" =>'required',
            "excerpt" =>'required',
            "body" =>'required'
        ]);
    }
}
