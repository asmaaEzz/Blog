<x-admin-master>
    <h2>Edit a post</h2>
    @section('content')
        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    id="title"
                    placeholder="Enter your post title"
                    value="{{$post->title}}"
                >
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <img width="40" src="{{$post->post_image}}">
                <input
                    type="file"
                    name="post_image"
                    class="form-control-file"
                    id="post_image"
                >
            </div>
            <div class="form-group">
                <textarea
                    name="body"
                    class="form-control"
                    id="body"
                    cols="30"
                    rows="10"

                >
                {{$post->body}}

                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>

        </form>
    @endsection
</x-admin-master>
