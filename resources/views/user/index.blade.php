@extends('layouts.app')

@section('title', 'All Users')

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">{{ $users->total() }} Users</span>
                <a href="{{ route('users.create') }}" class="btn btn-outline-primary">Create User</a>
            </h4>
        </div>

        <div class="col-12" id="accordion">
            @each('partials.user-card', $users, 'user')
        </div>

        <div class="col-12 mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection