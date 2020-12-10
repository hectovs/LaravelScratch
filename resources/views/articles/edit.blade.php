@extends('layout')

@section('content')
    <div id="wrapper"> 
        <div id="page" class="container">
            <h1>Update Article</h1>

            <form method="POST" action="/articles/{{$article->id}}">
                @csrf
                @method('PUT')
                
                <div class="field">
                    <label class="label" for="title"> Title </label>

                    <div class= "control">
                        <input class="input" type="text" name="title" id="title" value="{{$article->title}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="Excerpt"> Excerpt </label>

                    <div class= "control">
                        <textarea class="textarea" type="text" name="Excerpt" id="Excerpt">{{$article->excerpt}}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="Body"> Body </label>

                    <div class= "control">
                        <textarea class="textarea" type="text" name="Body" id="Body">{{$article->body}}</textarea>
                    </div>
                </div>

                <div class="field is grouped">
                    <div class="control">
                        <button class="button is link" type="submit">Submit</button>
                    </div>
                </div>

                
            </form>


        </div>

    </div>

@endsection
