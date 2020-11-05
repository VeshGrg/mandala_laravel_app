<div class="col-12 mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="card-title font-weight-bold">Profile Details</div>

            <form action="{{ route('profile') }}" method="POST">
                @method('PATCH')
                @csrf

                <div class="form-group form-row">
                    <div class="col-md-6">
                        <label for="">Birthday</label>
                        <input type="date" value="{{ $user->profile->birthday }}" 
                            class="form-control @error('date') is-invalid @enderror" name="birthday" required>
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="">Gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                            <option value="male" @if($user->profile->getRawOriginal('gender') == 'male') selected @endif>Male</option>
                            <option value="female" @if($user->profile->getRawOriginal('gender') == 'female') selected @endif>Female</option>
                            <option value="other" @if($user->profile->getRawOriginal('gender') == 'other') selected @endif>Other</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Bio</label>
                    <textarea name="bio" cols="30" rows="10" class="form-control @error('bio') is-invalid @enderror" required
                        placeholder="Enter Your Bio Description">{{ $user->profile->bio }}</textarea>
                    @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-outline-success float-right" type="submit">Update Profile Details</button>
                </div>
            </form>
        </div>
    </div>
</div>