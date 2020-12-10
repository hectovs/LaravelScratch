@extends('layout')

@section('content')
    <div id="wrapper"> 
        <div id="page" class="container">
            <h1>New Article</h1>

            <form method="POST" action="/articles">
                @csrf
                
                <div class="field">
                    <label class="label" for="title"> Title </label>

                    <div class= "control">
                        <input class="input @error('title') is-danger @enderror " 
                            type="text" 
                            name="title" 
                            id="title" 
                            value="{{old('title')}}">

                        @error('title')
                            <p class="help is-danger"> {{$errors -> first('title')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="Excerpt"> Excerpt </label>

                    <div class= "control">
                        <textarea class="textarea @error('Excerpt') is-danger @enderror" type="text" name="Excerpt" id="Excerpt" value="{{old('excerpt')}}"></textarea>
                        @error('Excerpt')
                            <p class="help is-danger"> {{$errors -> first('Excerpt')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="Body"> Body </label>

                    <div class= "control">
                        <textarea class="textarea @error('Body') is-danger @enderror" type="text" name="Body" id="Body" value="{{old('Body')}}"></textarea>
                        @error('Body')
                            <p class="help is-danger"> {{$errors -> first('Body')}}</p>
                        @enderror
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
