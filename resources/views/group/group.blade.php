@extends("layout.layout")
@section("content")
  <div class="container">
    <div class="col-md-10 offset-1">
        <h5 class="text-center my-3">Group List:</h5>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Group List Here
            </div>
            @if (session("deletegroup"))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{session("deletegroup")}}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(session("creategroup"))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{session("creategroup")}}</div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card-body">
               <div class="row">
                    <div class="col-md-3">
                        <h4>User Groups</h4>
                    </div>
                    <div class="col-md-3 offset-6">
                        <a class="btn btn-success mb-4"href="{{asset('addgroup')}}"><i class="fa fa-plus"></i>Add User Group</a>
                    </div>
               </div>
                <table id="datatablesSimple" class="text-center">
                    <thead >
                        <tr>
                            <th class="text-center">Group Id</th>
                            <th class="text-center">Group Title</th>
                            <th class="text-center">Create_at</th>
                            <th class="text-center">Updated_at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Group Id</th>
                            <th>Group Title</th>
                            <th>Create_at</th>
                            <th>Updated_at</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($usergroup as $singlegroup)
                            <tr>
                                <td>{{$singlegroup->id}}</td>
                                <td>{{$singlegroup->title}}</td>
                                <td>{{$singlegroup->created_at}}</td>
                                <td>{{$singlegroup->updated_at}}</td>
                                <td>
                                    <form action="{{asset('deletegroup')}}/{{$singlegroup->id}}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button onclick="return confirm('r u sure delete?')" class="btn btn-danger text-capitalize text-center"><i class="fa fa-delete"></i><span style="margin-left:8px">Delete</span></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
