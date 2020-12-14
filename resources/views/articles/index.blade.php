@extends('layout')

@section('content')



<div id="wrapper">
        <div id="page" class="container">
   
            <div id="page">
                <ul class="container">
                    
                    @forelse ($articles as $article)
                        <li class="first">
                            <h3>
                                <a href="{{$article->path()}}">{{$article->title}}</a>
                            </h3>
                            <p><a href="/articles/{{$article->id}}">{{$article->excerpt}}</a></p>
                        </li>

                    @empty
                        <p>No relevant articles yet!</p>    
                    @endforelse
                </ul>

                </div>
            </div>
        </div>
    </div>


@endsection 