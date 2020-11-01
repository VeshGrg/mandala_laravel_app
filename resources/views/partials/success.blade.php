@if(session()->has('success'))
<div class="col-12 mb-4">
    <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
        {{ session('success') }}
        <button type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif