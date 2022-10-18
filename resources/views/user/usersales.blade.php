@extends("user.userlayout")
@section("userlayoutcontent")
    <div class="card-body">
        <div class="row">
                <div class="col-md-3">
                    <h4>Sales List:</h4>
                </div>
                <div class="col-md-3 offset-6">
                    <a class="btn btn-primary mb-3" data-bs-toggle="modal" href="#usernewsale" role="button"><i class="fa fa-plus"></i>New Sale</a>
                </div>
        </div>
        @if (session("usersale"))
            <div class="alert alert-success text-capitalize text-center">{{session("usersale")}}</div>
        @endif
        <table id="datatablesSimple" class="text-center">
            <thead >
                <tr>
                    <th class="text-center">Sale Id</th>
                    <th class="text-center">Callan NO</th>
                    <th class="text-center">User Name</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="text-center">Sale Id</th>
                    <th class="text-center">Callan NO</th>
                    <th class="text-center">User Name</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </tfoot>

            <tbody>
                @forelse ($usersale as $singleusersale)
                    <tr>
                        <td>{{$singleusersale->id}}</td>
                        <td>{{$singleusersale->challan_no}}</td>
                        <td>{{$singleusersale->user->name??"N/a"}}</td>
                        <td>{{$singleusersale->date??"N/a"}}</td>
                        <td>
                            <a class="btn btn-dark btn-sm" href="{{asset('usersaleinvoice/view/')}}/{{$singledata->id}}/{{$singleusersale->id}}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary text-capitalize btn-sm" href="{{asset('user')}}/{{$singleusersale->id}}/edit"><i class="fa fa-edit"></i></a>
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


    <!--usernewsale mortal-->
    <div class="modal fade" id="usernewsale" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">New Sale Form:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 pb-5">
                                <h4 class="text-center mt-4">Add New Sale:</h4>
                                <form class="mt-4 p-5 bg-info" style="border-radius: 12px;margin-top:20px" action="{{asset('usersale/store')}}/{{$singledata->id}}" method="post">
                                    @csrf
                                    @method("post")
                                    <div class="mb-3">
                                        <label for="challannumber" class="form-label">Challan Number:</label>
                                        {{-- @error("challannumber")
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror --}}
                                        <input type="double" value="{{old('challannumber')}}" name="challannumber" class="form-control @error("amount")
                                        is-invalid
                                        @enderror" id="challannumber" placeholder="Enter challan number...">
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date:<span>**</span></label>
                                        @error("date")
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        <input type="date" value="{{old('date')}}" name="date" class="form-control @error("date")
                                            is-invalid
                                        @enderror" id="date" placeholder="Enter Date...">
                                    </div>

                                    <div class="mb-3">
                                        <label for="text" class="form-label">Note:</label>
                                        @error("note")
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        <textarea class="form-control" name="note" id="note" cols="4" rows="4" placeholder="write sales note here...."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
                </div>
            </div>
        </div>
    </div>


@endsection


