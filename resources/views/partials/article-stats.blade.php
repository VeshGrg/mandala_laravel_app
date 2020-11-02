<div class="row mb-4">
    <div class="col-12">
        <h4>Basic Stats</h4>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="card-title font-weight-bold mb-0">Unique Visitors</div>
                <div class="display-4">{{ $uniqueVisitors }}<small class="h6 text-muted">visitors</small></div>
            </div>
        </div>
    </div>

    {{-- <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="card-title font-weight-bold mb-0">Unique Views</div>
                <div class="display-4">{{ $uniqueArticleViews }}<small class="h6 text-muted">views</small></div>
            </div>
        </div>
    </div> --}}

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="card-title font-weight-bold mb-0">Total Views</div>
                <div class="display-4">{{ $totalViews }}<small class="h6 text-muted">views</small></div>
            </div>
        </div>
    </div>
</div>