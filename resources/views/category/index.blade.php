@extends('layouts.app')

@section('title' ,__('All Categories'))

@section('content')

<div class="row">

    @include('partials.goback')

    <div class="col-12">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">{{ $categories->count() }} Categories</span>
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">New Category</a>
        </h4>

        <ul class="list-group mb-3">

            @foreach ($categories as $category)
                <li class="category-item list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">
                            {{ $category->title }}
                        </h6>

                        <small class="text-muted">
                            {{ $category->articles_count }} Articles
                        </small>
                    </div>

                    <div>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-info btn-sm">Update</a>
                        <a href="#" onclick="confirm('Are you sure?') && document.getElementById('post-delete-{{ $category->id }}').submit()" 
                            class="btn btn-outline-danger btn-sm">Delete</a>

                        <form method="post" hidden id="post-delete-{{ $category->id }}"
                            action="{{ route('categories.destroy', $category) }}">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection


    