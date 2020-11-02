<div class="p-3 mb-3 bg-light rounded text-center">
    <div class="author mb-2">
        <img src="{{ $article->user->profile_photo_url }}"
            width="100px"
            height="100px"
            class="img-fluid profile-img rounded-circle mx-auto"
            alt="">
    </div>

    <h4 class="font-italic">About {{ $article->user->name }}</h4>
    <p class="mb-0">{{ $article->user->profile->bio }}</p>
</div>