<div class="card mb-2">
    <div class="card-header mb-0 d-flex justify-content-between align-items-center">
        <h3>
            <img src="{{ $user->profile_photo_url }}" alt="" width="44px" height="44px" class="rounded-circle profile-img">

            <button class="btn btn-link"
                data-toggle="collapse"
                data-target="#user-collapse-{{ $user->id }}"
                aria-expanded="false">
                {{ $user->name }}
            </button>
        </h3>

        <div>
            <a href="{{ route('users.edit', $user) }}"
                class="btn btn-outline-info btn-sm">Update</a>
            <a href="#"
                onclick="confirm('Are you sure?') && document.getElementById('user-delete-{{ $user->id }}').submit()"
                class="btn btn-outline-danger btn-sm">Delete</a>

            <form method="post"
                hidden
                id="user-delete-{{ $user->id }}"
                action="{{ route('users.destroy', $user) }}">
                @method('DELETE')
                @csrf
            </form>
        </div>
    </div>

    <div id="user-collapse-{{ $user->id }}"
        class="collapse"
        aria-labelledby="headingOne"
        data-parent="#accordion">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Email:</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                <dt class="col-sm-3">Birthday:</dt>
                <dd class="col-sm-9">{{ $user->profile->birthday != null ? $user->profile->birthday->format('F d, Y') : "" }}</dd>

                <dt class="col-sm-3">Gender:</dt>
                <dd class="col-sm-9">{{ $user->profile->gender }}</dd>

                <dt class="col-sm-3">Bio:</dt>
                <dd class="col-sm-9">{{ $user->profile->bio }}</dd>

            </dl>
        </div>
    </div>
</div>
