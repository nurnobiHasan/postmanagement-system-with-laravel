@extends("user.userlayout")
@section("userlayoutcontent")
    <div class="card-body">
        <div class="row">
                <div class="col-md-3">
                    <h4>Purcheses List:</h4>
                </div>
                <div class="col-md-3 offset-6">
                    <a class="btn btn-success mb-4"href="{{asset('user/create')}}"><i class="fa fa-plus"></i>Add New User</a>
                </div>
        </div>
            <table id="datatablesSimple" class="text-center">
                <thead >
                    <tr>
                        <th class="text-center">Purchaes Id</th>
                        <th class="text-center">Callan NO</th>
                        <th class="text-center">User Name</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">Purches Id</th>
                        <th class="text-center">Callan NO</th>
                        <th class="text-center">User Name</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($userpurches as $singleuserpurchea)

                        <tr>
                            <td>{{$singleuserpurchea->id}}</td>
                            <td>{{$singleuserpurchea->challan_no}}</td>
                            <td>{{$singleuserpurchea->user->name}}</td>
                            <td>{{$singleuserpurchea->date}}</td>
                            <td>
                                <a class="btn btn-dark btn-sm" href="{{asset('userinfo')}}/{{$singleuserpurchea->id}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary text-capitalize btn-sm" href="{{asset('user')}}/{{$singleuserpurchea->id}}/edit"><i class="fa fa-edit"></i></a>
                                {{-- <form action="{{asset('user')}}/{{$singleusersale->id}}" method="post" class="d-inline-block">
                                    @csrf
                                    @method("delete")
                                    <button onclick="confirm('r u sure delete?')" class="btn btn-danger text-capitalize text-center btn-sm"><i class="fa fa-delete"></i></button>
                                </form> --}}
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


@endsection




