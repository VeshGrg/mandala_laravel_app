@extends('layouts.app')

@section('title', $article->title)

@section('content')

<div class="row">
    <div class="col-md-8 blog-main">

        <div class="blog-post">
            <h2 class="blog-post-title">{{ $article->title }}</h2>
            <p class="blog-post-meta">{{ $article->created_at->format('F d, Y') }} by <a
                    href="#">{{ $article->user->name }}</a></p>
            <p class="blog-post-content">{!! nl2br($article->content) !!}</p>
        </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
        <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About {{ $article->user->name }}</h4>
            <p class="mb-0">{{ $article->user->profile->bio }}</p>
        </div>

        {{-- <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
                <li><a href="#">March 2014</a></li>
                <li><a href="#">February 2014</a></li>
                <li><a href="#">January 2014</a></li>
                <li><a href="#">December 2013</a></li>
                <li><a href="#">November 2013</a></li>
                <li><a href="#">October 2013</a></li>
                <li><a href="#">September 2013</a></li>
                <li><a href="#">August 2013</a></li>
                <li><a href="#">July 2013</a></li>
                <li><a href="#">June 2013</a></li>
                <li><a href="#">May 2013</a></li>
                <li><a href="#">April 2013</a></li>
            </ol>
        </div> --}}
    </aside><!-- /.blog-sidebar -->

    <div class="col-12 blog-comments mt-4">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Comments
        </h3>

        @auth
            @each('partials.comment', $article->comments, 'comment')

            <form id="comment-form" action="{{ route('comments.store') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">

                <div class="form-group">
                    <label for="">Leave a comment.</label>
                    <textarea class="form-control"
                        placeholder="Type your comment here"
                        name="content"
                        id="content"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Comment</button>
                </div>
            </form>
        @else
            <p class="text-center">Please login to comment.</p>
        @endauth

    </div>
</div>

@endsection

@section('footer')
    <script>
        $(function() {
            'use strict';

            $('#comment-form').submit(function(e){
                e.preventDefault();

                var formData = new FormData(this);

                console.log(formData);

                // $.post("{{ route('comments.store') }}", this.form);
            });
        });
    </script>
@endsection