@extends('layouts.app')

@section('content')
    <div class="row mb-2">

        <div class="col-12">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                Latest Articles
            </h3>
        </div>

        @each('partials.article-card', $articles, 'article')

        <div class="col-12 mb-4 text-center">
            <a href="{{ route('articles.index') }}">
                See All Other Blogs
            </a>
        </div>

    </div>
@endsection