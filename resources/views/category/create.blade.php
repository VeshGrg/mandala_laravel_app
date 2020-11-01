
@extends('layouts.app')

@section('title','Create Category')

@section('content')

    @include('partials.goback')
    
    <h2 class="mb-4">'New Category'</h2>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title"> Title </label>
            <input type="text" name="title" class="form-control" placeholder="Enter Category Name">
        </div>

        <div class="form-group">
            <button class="btn btn-success">Create Category</button>
        </div>
    </form>
@endsection
