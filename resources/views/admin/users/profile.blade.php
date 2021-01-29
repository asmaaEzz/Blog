<x-admin-master>
    @section('content')
        <h1>{{$user->name}}</h1>

        <form method="post" action="{{route('user.profile.update',$user)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="avatar">avatar</label>
                <input type="file" name="avatar">
            </div>

            <div class="form-group">
                <img class="img-profile rounded-circle" src="{{$user->avatar}}" width="60" height="60">
            </div>
            <div class="form-group">
                <label for="username">UserName</label>
                <input
                    type="text"
                    name="username"
                    class="form-control @error('username') is-invalid @enderror "
                    id="username"

                    value="{{$user->username}}"
                >
                @error('username')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"

                    value="{{$user->name}}"
                >
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="text"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    value="{{$user->email}}"
                >
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                    >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password confirm</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control "
                        id="password_confirmation"
                    >
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

    @endsection
</x-admin-master>
