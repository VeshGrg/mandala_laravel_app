@extends('layouts.app')
@section('title' ,__(' Home'))
@section('content')

    <style>

        ---.li {
            margin: 25px;
            position: absolute;
            top:15%;
            left: 40%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    </style>
        <div class="container">
            <div  >
                <a href="{{route('articles.create')}}" class="btn btn-lg btn-primary mb-4 ">New Article</a>
            </div>

                @forelse ($articles as $article)
                    <div class="mb-4">

                <a href="{{route('articles.edit',$article)}}" class="btn btn-warning "> {{'Update'}}</a>
                <form method="post" action="{{route('articles.destroy',$article)}}" style="display: inline-block" >
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" onclick=" return confirm {{'Are you sure ?'}}" >{{'Delete'}}</button>
                </form>
                    <a href="{{route('articles.show',$article)}}" > {{$article->title}} </a>

</div>

        @empty
    <p>{{'Sorry you do not have blogs yet'}}</p>
    @endforelse

@endsection
