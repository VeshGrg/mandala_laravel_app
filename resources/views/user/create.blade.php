
@extends('layouts.app')

@section('title', 'Create User')

@section('content')

    @include('partials.goback')
    
    <h2>'Create User'</h2>

    <form action="{{route('users.store')}}" method="post">
        @csrf

        <div class="form-group form-row">
            <div class="col-md-6 col-12">
                <label> Name </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 col-12">
                <label> Email </label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-md-6 col-12">
                <label> Password </label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label> Confirm Password </label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>
            </div>
        </div>

        <hr>
        
        <div class="form-group">
            <label class="font-weight-bold">Assign role for the user</label>
            <select name="role" id="" class="form-control">
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Create User</button>
        </div>
    </form>
@endsection
