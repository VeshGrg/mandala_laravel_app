
@extends('layouts.app')

@section('title','Create article')

@section('content')
    <div class="row">
    @foreach($articles as $article)
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-header"> <a  href="{{route('articles.show', $article->id)}}" > {{$article->title}} </a>

                </h4>
                <div class="card-body">
                    {{$article->content}}
                </div>
                <div class="card-footer">

                    posted by: {{($article->user->name)}}
                </div>
            </div>
        </div>

    @endforeach
@endsection
