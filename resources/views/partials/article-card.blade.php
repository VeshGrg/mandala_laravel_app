<div class="col-md-6">
    <div class="card flex-md-row mb-4 box-shadow h-md-250">
        <div class="card-body d-flex flex-column align-items-start">

            <div class="truncate mb-2">
                @foreach ($article->categories as $category)
                    <a href="#" class="d-inline-block text-success font-weight-bold">
                        {{ $category->title }}
                    </a>
                @endforeach
            </div>
        
            <h3 class="mb-0">
                <a class="text-dark truncate l2"
                    href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
            </h3>

            <div class="mb-1 text-muted">{{ $article->created_at->format('F d, Y') }}</div>

            <p class="card-text mb-auto truncate l2">{{ $article->content }}.</p>
            
            <a href="#">By {{ $article->user->name }}</a>
        </div>
        
        @if($article->featured_image)
            <img class="card-img-right flex-auto d-none d-md-block featured-image"
                data-src="holder.js/200x250?theme=thumb"
                alt="Featured Image"
                style="width: 200px; height: 250px;"
                src="{{ $article->featured_image }}"
                data-holder-rendered="true">
        @endif
    </div>
</div>