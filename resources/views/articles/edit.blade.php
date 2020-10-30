
@extends('layouts.app')

@section('title','Create article')

@section('content')
    <h2>Blog update: {{$article->title}}</h2>
    <form action="{{route('articles.update',$article->id)}}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title"> Title </label>
            <input type="text" name="title" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>
        <div class="form-group">

            @foreach($categories as $id => $title)
                <label for="category{{$id}}">{{$title}}</label>
                <input type="checkbox" name="categories[]" value="{{$id}}" id="category{{$id}}"
                @if(isset($article)&& in_array($id,$articlecategories)) checked @endif
            @endforeach
        </div>
        <div class="form-group">
            <label for="content"> Content </label>
            <textarea  name="content" class="form-control" id="content" cols="30" rows="10">@isset($article){{$article->content}} @endisset
            </textarea>
        </div>
        <div  class="form-group">
            <button class="btn btn-success">Submit blog</button>
        </div>
    </form>
@endsection
