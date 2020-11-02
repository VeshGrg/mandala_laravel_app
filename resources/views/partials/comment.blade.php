<div class="media mb-2">
    <img class="profile-img rounded-circle mr-3" width="64px" height="64px"
        src="{{ $comment->user->profile_photo_url }}">

    <div class="media-body">
        <h5 class="mt-0">{{ $comment->user->name }}</h5>
        {{ $comment->content }}
    </div>
</div>