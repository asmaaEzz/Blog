<x-admin-master>
    @section('content')
        @if(session('user_deleted'))
            <div class=" alert alert-danger">
                {{session('user_deleted')}}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>user name</th>
                            <th>email</th>
                            <th>avatar</th>
                            <th>Created at</th>
                            <th>updated at</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>user name</th>
                            <th>email</th>
                            <th>avatar</th>
                            <th>Created at</th>
                            <th>updated at</th>
                            <th>Delete</th>

                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>

                                <td>
                                    <img src="{{$user->avatar}}" height="40px">
                                </td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form method="post" action="{{route('user.destroy' , $user->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection

    @section('scripts')
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
            <!-- Page level custom scripts -->
            <script src={{asset("js/demo/datatables-demo.js")}}></script>



        @endsection
</x-admin-master>
