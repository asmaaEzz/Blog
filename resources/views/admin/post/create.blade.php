<x-admin-master>
    <h2>Create post</h2>
    @section('content')
        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input
                type="text"
                name="title"
                class="form-control"
                id="title"
                placeholder="Enter your post title">
            </div>
            <div class="form-group">
                <label for="file">File</label>
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
                    rows="10">


                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>

        </form>
    @endsection
</x-admin-master>
