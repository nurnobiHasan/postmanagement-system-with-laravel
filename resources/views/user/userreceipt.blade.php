@extends("user.userlayout")
@section("userlayoutcontent")
    <div class="card-body">
        <div class="row">
                <div class="col-md-3">
                    <h4>Receipts List:</h4>
                </div>
                <div class="col-md-3 offset-6">
                    <a class="btn btn-primary mb-3" data-bs-toggle="modal" href="#exampleModalToggle2" role="button"><i class="fa fa-plus"></i>New Receipt</a>

                </div>
        </div>
            @if (session("addreceipt"))
                <div class="alert alert-success text-center text-capitalize">{{session("addreceipt")}}</div>
            @endif
            @if (session("deletereceipt"))
                <div class="alert alert-success text-center text-capitalize">{{session("deletereceipt")}}</div>
            @endif
            <table id="datatablesSimple" class="text-center">
                <thead >
                    <tr>
                        <th class="text-center">Receipt Id</th>
                        <th class="text-center">User Name</th>
                        <th class="text-center">Receipt By</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">Receipt Id</th>
                        <th class="text-center">User name</th>
                        <th class="text-center">Receipt By</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Action</th>

                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($userreceipt as $singleuserreceipt)
                        <tr>
                            <td>{{$singleuserreceipt->id}}</td>
                            <td>{{$singleuserreceipt->user->name}}</td>
                            <td>{{$singleuserreceipt->admin->name}}</td>
                            <td>{{$singleuserreceipt->amount}}</td>
                            <td>{{$singleuserreceipt->receipt_date}}</td>
                            <td>{{$singleuserreceipt->note}}</td>
                            <td>

                                 <form action="{{asset('userreceiptp/delete')}}/{{$singledata->id}}/{{$singleuserreceipt->id}}" method="post" class="d-inline-block">
                                    @csrf
                                    @method("delete")
                                    <button onclick="confirm('r u sure delete?')" class="btn btn-danger text-capitalize text-center btn-sm"><i class="fa fa-delete"></i><span style="margin-left:5px">delete</span></button>
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


     <!--userreceipt mordal-->
     <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel">User Receipt Form:</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 pb-5">
                            <h4 class="text-center mt-4">Add New Receipt:</h4>
                            <form class="mt-4 p-5 bg-info" style="border-radius: 12px;margin-top:20px" action="{{asset('userreceipt/store')}}/{{$singledata->id}}" method="post">
                                @csrf
                                @method("post")
                                <div class="mb-3">
                                  <label for="amount" class="form-label">Receipt Amount:<span>**</span></label>
                                  @error("amount")
                                      <div class="alert alert-danger">{{$message}}</div>
                                  @enderror
                                  <input type="double" value="{{old('amount')}}" name="amount" class="form-control @error("amount")
                                      is-invalid
                                  @enderror" id="amount" placeholder="Enter Amount...">
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
                                    <textarea class="form-control" name="note" id="note" cols="4" rows="4" placeholder="Enter Note Here..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>


@endsection


