@extends('layouts.app')

@section('title', 'All Articles')

@section('content')
    <div class="row mb-2">

        <div class="col-12">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                All Articles
            </h3>
        </div>

        @each('partials.post-card', $articles, 'article')

        <div class="col-12">
            {{ $articles->links() }}
        </div>
    </div>
@endsection