@extends("layout.layout")
@section("content")
<div class="container">
    <div class="col-md-12">
        <h5 class="text-center my-3">Users List:</h5>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    Users List Here
            </div>
            @if (session("messagecreate"))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{session("messagecreate")}}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session("updateuser"))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{session("updateuser")}}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session("userdelete"))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-2 my-3">
                        <div class="alert alert-success text-center text-capitalize">{{session("userdelete")}}</div>
                    </div>
                </div>
            </div>
        @endif
            <div class="card-body">
               <div class="row">
                    <div class="col-md-3">
                        <h4>User List:</h4>
                    </div>
                    <div class="col-md-3 offset-6">
                        <a class="btn btn-success mb-4"href="{{asset('user/create')}}"><i class="fa fa-plus"></i>Add New User</a>
                    </div>
               </div>
                <table id="datatablesSimple" class="text-center">
                    <thead >
                        <tr>
                            <th class="text-center">User Id</th>
                            <th class="text-center">Group Name</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">User Email</th>
                            {{-- <th class="text-center">User Phone</th>
                            <th class="text-center">User Address</th> --}}
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">User Id</th>
                            <th class="text-center">Group Id</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">User Email</th>
                            {{-- <th class="text-center">User Phone</th>
                            <th class="text-center">User Address</th> --}}
                            <th class="text-center">Action</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        @forelse ($users as $singleuser)
                            <tr>
                                <td>{{$singleuser->id??"N/a"}}</td>
                                <td>{{$singleuser->group->title??"N/a"}}</td>
                                <td>{{$singleuser->name??"N/a"}}</td>
                                <td>{{$singleuser->email??"N/a"}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{asset('userinfo')}}/{{$singleuser->id}}"><i class="fa fa-eye"></i>Show User</a>
                                    <a class="btn btn-primary text-capitalize btn-sm" href="{{asset('user')}}/{{$singleuser->id}}/edit"><i class="fa fa-edit"></i>edit user</a>
                                    <form action="{{asset('user')}}/{{$singleuser->id}}" method="post" class="d-inline-block">
                                        @csrf
                                        @method("delete")
                                        <button onclick="confirm('r u sure delete?')" class="btn btn-danger text-capitalize text-center btn-sm"><i class="fa fa-delete"></i><span style="margin-left:8px">Delete</span></button>
                                    </form>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="50">Data Record Not Fouond</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
