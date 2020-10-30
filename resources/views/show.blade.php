@extends('layouts.app')
@section('title',('show'))


@section('content')
    <h3 class="text">Latest Blogs </h3>
    <div class="row">
        @forelse($articles as $article)

            <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header"><a  href="{{route('articles.show', $article->id)}}" > {{$article->title}} </a>


                    </h4>
                    <div class="card-body">
                        {{$article->content}}
                    </div>
                    <div class="card-footer">

                        {{'posted by'}}: {{$article->user->name}}
                    </div>
                </div>
            </div>
            @empty
                NO Blogs yet
        @endforelse

    <a class="btn-btn-link" href="{{route('articles.index')}}">See all blogs<a>
@endsection
