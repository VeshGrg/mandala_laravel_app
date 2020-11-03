@extends('layouts.app')

@section('title', $article->title)

@section('content')

    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <div class="blog-categories mb-2">
                    @foreach ($article->categories as $category)
                    <a href="#"
                        class="d-inline-block text-success font-weight-bold">
                        {{ $category->title }}
                    </a>
                    @endforeach
                </div>

                @if($article->featured_image )
                    <div class="blog-featured-image mb-4">
                        <img src="{{ $article->featured_image }}"
                            class="img-fluid"
                            alt="">
                    </div>
                @endif

                <h2 class="blog-post-title">{{ $article->title }}</h2>
                <p class="blog-post-meta">
                    {{ $article->created_at->format('F d, Y') }} 
                    by <a href="#">{{ $article->user->name }}</a>
                </p>
                <p class="blog-post-content">{!! nl2br($article->content) !!}</p>
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">

            @include('partials.author-card')

            @include('partials.exchange-rates-card')

        </aside><!-- /.blog-sidebar -->

        <div class="col-12 blog-comments mt-4">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                Comments
            </h3>

            @auth
                <div id="comment-listing">
                    @each('partials.comment', $article->comments, 'comment')
                </div>

                @can('create comments')
                    @include('partials.comment-form')
                @else
                    <p>You are not allowed to comment.</p>
                @endcan

            @else
                <p class="text-center">Please login to comment.</p>
            @endauth

        </div>
    </div>

@endsection