@extends('user.userlayout')
@section('userlayoutcontent')
    <div class="row mt-3">
        <div class="col-md-6 offset-">
            <table class="table table-striped text-center">
                <tr>
                    <td> Name:</td>
                    <td class="text-danger text-capitalize">{{ $singleuserinvoice->user->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td> Email:</td>
                    <td class="text-danger text-capitalize">{{ $singleuserinvoice->user->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td> Phone:</td>
                    <td class="text-danger text-capitalize">{{ $singleuserinvoice->user->phone ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td> Address:</td>
                    <td class="text-danger text-capitalize">{{ $singleuserinvoice->user->address ?? 'N/A' }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4 offset-1">
            <table class="table table-striped text-center mt-5">
                <tr>
                    <td>Challan Number:</td>
                    <td class="text-danger text-capitalize">{{ $singleuserinvoice->challan_no }}</td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td class="text-danger text-capitalize">{{ $singleuserinvoice->date }}</td>
                </tr>
            </table>
        </div>
    </div>





    {{-- <div class="container"> --}}
    <div class="col-md-12">
        <h5 class="text-center my-3">Sale Invoice Items List:</h5>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Sale Invoicce Items Here
            </div>
            @if (session('deletesaleitem'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{ session('userdelete') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('prodductitem'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{ session('prodductitem') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="mb-4">Sale Invoice Item:</h4>
                    </div>
                    {{-- <div class="col-md-3 offset-6">
                        <a class="btn btn-primary mb-3" data-bs-toggle="modal" href="{{asset('product/create')}}" role="button"><i
                                class="fa fa-plus"></i>Add New Product</a>
                    </div> --}}
                </div>
                <table id="datatablesSimple" class="text-center text-capitalize">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">P Name</th>
                            <th class="text-center">quantity</th>
                            <th class="text-center">Prize</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($singleuserinvoice->saleinvoiceitems as $singlesaleitem)
                            <tr>
                                <td>{{ $singlesaleitem->id }}</td>
                                <td>{{ $singlesaleitem->product->title ?? 'N/a' }}</td>
                                <td>{{ $singlesaleitem->quantity ?? 'N/a' }}</td>
                                <td>{{ $singlesaleitem->prize ?? 'N/a' }}</td>
                                <td>{{ $singlesaleitem->total ?? 'N/A' }}</td>
                                <td>
                                    <form
                                        action="{{ asset('usersaleinvoice/delete') }}/{{ $singledata->id }}/{{ $singleuserinvoice->id }}/{{ $singlesaleitem->id ?? 'N/A' }}"
                                        method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button onclick="confirm('r u sure delete?')"
                                            class="btn btn-danger text-capitalize text-center btn-sm"><i
                                                class="fa fa-delete"></i><span
                                                style="margin-left:8px">delete</span></button>
                                    </form>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="50">Data Record Not Fouond</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="4">total amount=</td>
                            <td class="bg-dark text-light">{{ $singleuserinvoice->saleinvoiceitems->sum('total') }}<span
                                    style="padding-left:6px;font-weight:bold" class="text-danger">Taka</span></td>
                        </tr>
                        <td><a class="btn btn-success" data-bs-toggle="modal" href="#addsaleforinvoice" role="button"><i
                                    class="fa fa-plus"></i>New Sale</a></td>
                        <td><a class="btn btn-primary" data-bs-toggle="modal" href="#addreceivedforinvoice" role="button"><i
                                    class="fa fa-plus"></i>New Receive</a></td>
                        <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    <!--addreceived for invoice-->
    <div class="modal fade" id="addsaleforinvoice" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">New Sale For This Invoice:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 pb-5">
                                <h4 class="text-center mt-4">Add New sale for this invoice:</h4>
                                <form class="mt-4 p-5 bg-info" style="border-radius: 12px;margin-top:20px"
                                    action="{{ asset('userreceipt/store') }}/{{ $singledata->id }}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Receipt Amount:<span>**</span></label>
                                        @error('amount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="double" value="{{ old('amount') }}" name="amount"
                                            class="form-control @error('amount') is-invalid @enderror" id="amount"
                                            placeholder="Enter Amount...">
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date:<span>**</span></label>
                                        @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="date" value="{{ old('date') }}" name="date"
                                            class="form-control @error('date') is-invalid @enderror" id="date"
                                            placeholder="Enter Date...">
                                    </div>

                                    <div class="mb-3">
                                        <label for="text" class="form-label">Note:</label>
                                        @error('note')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea class="form-control" name="note" id="note" cols="4" rows="4"
                                            placeholder="Enter Note Here..."></textarea>
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
    <!--addpayment for invoice mordal-->
    <div class="modal fade" id="addreceivedforinvoice" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">New Receipt For This Invoice:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 pb-5">
                                <h4 class="text-center mt-4">Add Receive For this Invoice:</h4>
                                <form class="mt-4 p-5 bg-info" style="border-radius: 12px;margin-top:20px"
                                    action="{{ asset('userreceipt/store') }}/{{ $singledata->id }}/{{$singleuserinvoice->id}}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Receipt Amount:<span>**</span></label>
                                        @error('amount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="double" value="{{ old('amount') }}" name="amount"
                                            class="form-control @error('amount') is-invalid @enderror" id="amount"
                                            placeholder="Enter Amount...">
                                    </div>

                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date:<span>**</span></label>
                                        @error('date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="date" value="{{ old('date') }}" name="date"
                                            class="form-control @error('date') is-invalid @enderror" id="date"
                                            placeholder="Enter Date...">
                                    </div>

                                    <div class="mb-3">
                                        <label for="text" class="form-label">Note:</label>
                                        @error('note')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea class="form-control" name="note" id="note" cols="4" rows="4"
                                            placeholder="Enter Note Here..."></textarea>
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
