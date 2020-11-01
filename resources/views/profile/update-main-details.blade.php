<div class="col-md-6">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="card-title font-weight-bold">Main Details</div>
            
            <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="profile-img" role="button">
                        <img src="{{ $user->profile_photo_url }}" id="picture-preview" alt="" width="100px" height="100px" 
                            class="rounded-circle border border-secondary">
                    </label>
                    <input type="file" name="image" id="profile-img" hidden>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" 
                        class="form-control @error('name') is-invalid @enderror">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{ $user->email }}" 
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-outline-primary float-right">
                    Update Details
                </button>
            </form>
        </div>
    </div>
</div>