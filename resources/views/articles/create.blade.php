
@extends('layouts.app')

@section('title','Create article')

@section('content')
<h2>'Your words'</h2>
    <form action="{{route('articles.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title"> Title </label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">

            @foreach($categories as $category)
                <label for="category{{$category->id}}">{{$category->title}}</label>
            <input type="checkbox" name="categories[]" value="{{$category->id}}">

            @endforeach
        </div>
        <div class="form-group">
            <label for="content"> Content </label>
            <textarea  name="content" class="form-control" id="content" cols="30" rows="10">
            </textarea>
        </div>
        <div  class="form-group">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
