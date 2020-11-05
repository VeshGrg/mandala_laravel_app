@extends('layouts.app')

@section('title' ,__('Dashboard'))

@section('content')

    @role('admin')
        @include('partials.article-stats')
    @endrole

    <div class="row">
        <div class="col-12">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">{{ $articles->total() }} Articles</span>
                <a href="{{ route('articles.create') }}" class="btn btn-outline-primary">New Article</a>
            </h4>

            <ul class="list-group mb-3">

                @forelse ($articles as $article)
                    <li class="article-item list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">
                                <a href="{{ route('articles.show', $article) }}">
                                    {{ $article->title }}
                                </a>
                            </h6>
                            <small class="text-muted">
                                Published in {{ $article->created_at->format("F d, Y") }}
                            </small>
                        </div>

                        <div>
                            <a href="{{ route('articles.edit',$article) }}" class="btn btn-outline-info btn-sm">Update</a>
                            <a href="#" onclick="confirm('Are you sure?') && document.getElementById('post-delete-{{ $article->id }}').submit()" 
                                class="btn btn-outline-danger btn-sm">Delete</a>

                            <form method="post" hidden id="post-delete-{{ $article->id }}"
                                action="{{ route('articles.destroy', $article) }}">
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center lh-condensed">
                        <strong>No Articles! </strong> Start creating new ones.
                    </li>
                @endforelse

            </ul>

            {{ $articles->links() }}
        </div>
    </div>

@endsection
    