@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="row mb-2">

    @include('partials.success')

    <div class="col-12">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            My Profile
        </h3>
    </div>

    @include('profile.update-main-details')

    @include('profile.change-password')

    @include('profile.update-profile-details')

</div>
@endsection