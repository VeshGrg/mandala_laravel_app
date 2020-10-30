

@extends('layouts.app')

@section('title',$article->title)

@section('content')
    <div class="card">
        <h4 class="card-header">{{$article->title}}</h4>
<div class="card-footer">
    {!!nl2br($article->content)!!}
</div>


<div class="card-footer">

  <div> <span> <b> {{'Posted at'}}: </b>{{($article->created_at)}}</span>
  </div>
    <div> <span> <b> {{'Posted by'}}: </b>{{($article->user->name)}}</span>
    </div>

  <div>  <span><b>{{'Last update'}}:</b> {{$article->updated_at}}</span>
</div>
</div>
        @auth
<div id="'commentForm">
    <form action="{{route('comments.store')}}" method="post">
    @csrf
    <div class="form-group">

        <textarea class="form-control" placeholder="Type your comment here"
            name="content" id="content" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">

<button class ="btn btn-success" type="submit" > save </button>
    </div>
    </form>
</div>
    @else
            <p>Log in to comment</p>
    @endauth
@endsection
