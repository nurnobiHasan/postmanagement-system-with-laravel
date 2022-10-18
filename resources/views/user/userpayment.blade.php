@extends("user.userlayout")
@section("userlayoutcontent")
    <div class="card-body">
        <div class="row">
                <div class="col-md-3 mb-3">
                    <h4>Payments List:</h4>
                </div>
                <div class="col-md-3 offset-6">

                </div>
        </div>
            @if (session("addpayment"))
                <div class="alert alert-success text-center text-capitalize">
                    {{session("addpayment")}}
                </div>
            @endif
            @if (session("deletepayment"))
                <div class="alert alert-success text-center text-capitalize">
                    {{session("deletepayment")}}
                </div>
            @endif
            <table id="datatablesSimple" class="text-center">
                <thead >
                    <tr>
                        <th class="text-center">Payment Id</th>
                        <th class="text-center">User Name</th>
                        <th class="text-center">Payment By:</th>
                        <th class="text-center">T Amount</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">Payment Id</th>
                        <th class="text-center">User Name</th>
                        <th class="text-center">Payment By:</th>
                        <th class="text-center">T Amount</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($userpayment as $singleuserpayment)
                        <tr>
                            <td>{{$singleuserpayment->id}}</td>
                            <td>{{$singleuserpayment->user->name}}</td>
                            <td>{{$singleuserpayment->admin->name??"N/A"}}</td>
                            <td>{{$singleuserpayment->amount}}</td>
                            <td>{{$singleuserpayment->date}}</td>
                            <td>{{$singleuserpayment->note}}</td>
                            <td>

                                <form action="{{asset('userpayment/delete')}}/{{$singledata->id}}/{{$singleuserpayment->id}}" method="post" class="d-inline-block">
                                    @csrf
                                    @method("delete")
                                    <button onclick="confirm('r u sure delete?')" class="btn btn-danger text-capitalize text-center btn-sm"><i class="fa fa-delete"></i><span style="margin-left:6px">delete</span></button>
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

            <!--userpayment mortal-->
            <div class="modal fade" id="userpayment" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Payment Form:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 pb-5">
                                    <h4 class="text-center mt-4">Add New Payment:</h4>
                                    <form class="mt-4 p-5 bg-info" style="border-radius: 12px;margin-top:20px" action="{{asset('userpayment/store/')}}/{{$singledata->id}}" method="post">
                                        @csrf
                                        @method("post")
                                        <div class="mb-3">
                                        <label for="amount" class="form-label">Payment Amount:<span>**</span></label>
                                        @error("amount")
                                            <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        <input type="double" value="{{old('amount')}}" name="amount" class="form-control @error("amount")
                                            is-invalid
                                        @enderror" id="amount" placeholder="Enter Amouont...">
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
                                            <textarea class="form-control" name="note" id="note" cols="4" rows="4">Enter Note Here...</textarea>
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


