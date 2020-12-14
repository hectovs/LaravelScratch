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
        
        return view('articles.create', ['tags'=> Tag::all()]);
    }

    public function store()
    {
        $this->validateArticle(); 

        $article = new Article(request(['title','excerpt', 'body']));
        $article->user_id = 1; 
        $article->save();

        $article->tags()->attach(request('tags'));

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
            "body" =>'required',
            "tags" => 'exists:tags,id'
        ]);
    }
}
