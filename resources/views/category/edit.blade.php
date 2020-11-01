
@extends('layouts.app')

@section('title','Edit Category')

@section('content')

    @include('partials.goback')
    
    <h2 class="mb-4">'Edit Category: {{ $category->title }}'</h2>

    <form action="{{ route('categories.update', $category) }}" method="post">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="title"> Title </label>
            <input type="text" name="title" value="{{ $category->title }}" class="form-control" placeholder="Enter Category Name">
        </div>

        <div class="form-group">
            <button class="btn btn-success">Update Category</button>
        </div>
    </form>
@endsection
