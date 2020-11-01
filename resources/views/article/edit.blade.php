
@extends('layouts.app')

@section('title','Create article')

@section('content')

    @include('partials.goback')

    <h2>Blog update: {{$article->title}}</h2>

    <form action="{{ route('articles.update', $article) }}" method="POST">
        @method('PATCH')
        @csrf
        
        <div class="form-group">
            <label for="title"> Title </label>
            <input type="text" name="title" class="form-control" value="{{$article->title}}">
        </div>

        <div class="form-group">
            <label for="">Categories</label>
            <div class="form-inline">
                @foreach($categories as $category)
                    <div class="custom-control custom-checkbox mr-2">
                        <input type="checkbox" class="custom-control-input" 
                            id="category-{{$category->id}}" name="categories[]" 
                            value="{{ $category->id }}"
                            @if(in_array($category->id, $articlecategories)) checked @endif>
                        <label class="custom-control-label" for="category-{{$category->id}}">{{ $category->title }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="content"> Content </label>
            <textarea  name="content" class="form-control" id="content" cols="30" rows="10">{{$article->content}}</textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-success">Update Blog</button>
        </div>
    </form>
@endsection
