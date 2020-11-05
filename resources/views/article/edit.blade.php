
@extends('layouts.app')

@section('title','Edit Article')

@section('header')
    <link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.css') }}" />
    <script src="{{ asset('dropify/dist/js/dropify.min.js') }}"></script>
@endsection

@section('content')

    @include('partials.goback')
    
    <h2 class="mb-4">'Edit Article: {{ $article->title }}'</h2>

    <form action="{{ route('articles.update', $article) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="form-row">
            <div class="col-md-7 mr-auto">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                        value="{{ $article->title ?? old('title') }}" placeholder="Enter Title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" 
                        placeholder="Enter Content" cols="30" rows="14">{{ $article->content ?? old('content') }}</textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                <div class="card rounded shadow-sm mb-4">
                    <div class="card-body">
                        <label for="" class="card-title font-weight-bold">
                            Categories
                        </label>

                        <div class="categories-checkbox">
                            @foreach($categories as $category)
                                <div class="custom-control custom-checkbox mr-2">
                                    <input type="checkbox" class="custom-control-input" 
                                        id="category-{{$category->id}}" name="categories[]" 
                                        value="{{ $category->id }}"
                                        @if(in_array($category->id, $articlecategories)) checked @endif>
                                    <label class="custom-control-label" for="category-{{$category->id}}">{{ $category->title }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card rounded shadow-sm">
                    <div class="card-body">
                        <label for="" class="card-title font-weight-bold">
                            Featured Image
                        </label>

                        <input type="file" class="dropify" name="featured_image" 
                            data-show-remove="false" 
                            data-default-file="{{ $article->featured_image }}">
                    </div>  
                </div>
            </div>

            <div class="col-12 mt-4">
                <button class="btn btn-outline-success">Update Article</button>
            </div>
        </div>
  
    </form>
@endsection

@section('footer')
    <script>
        $(function(){
            'use strict';

            $('.dropify').dropify();
        });
    </script>
@endsection
