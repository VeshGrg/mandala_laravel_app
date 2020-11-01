<div class="col-md-6">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="card-title font-weight-bold">Change Password</div>
            <form action="{{ route('change.password') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Old Password</label>
                    <input type="password" name="old_password" 
                        class="form-control @error('old_password') is-invalid @enderror">
                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" name="new_password"
                        class="form-control @error('new_password') is-invalid @enderror">
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-outline-danger float-right">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</div>