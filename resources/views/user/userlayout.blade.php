@extends("layout.layout")
@section("content")
    <div class="container" >
        <div class="row" style="min-height:600px !important">
            <div class="col-md-12 p-4 bg-info mt-5">
                <h4 class="text-center text-capitalize pt-4"><span class="text-success">History Of:</span>{<strong class="text-light">{{$singledata->name}}</strong>}</h4>
                <a class="btn btn-success" href="{{asset('user')}}"><span><<</span>Go Back</a>
                <div class="row">
                    <div class="col-md-12 my-3">
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#usernewsale" role="button"><i class="fa fa-plus"></i>New Sale</a>
                        <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-plus"></i>New Purces</a>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle2" role="button"><i class="fa fa-plus"></i>New Receipt</a>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#userpayment" role="button"><i class="fa fa-plus"></i>New Payment</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-primary mb-2 mt-3 d-block  @if($button=="userinfo")
                            btn-success

                            @endif" href="{{asset('userinfo')}}/{{$singledata->id}}">User INfo</a>
                        <a class="btn btn-primary mb-2 d-block  @if ($button =="usersale")
                            btn-success
                        @endif" href="{{asset('usersale')}}/{{$singledata->id}}">User Sale</a>
                        <a class="btn btn-primary mb-2 d-block  @if ($button =="userpurces")
                            btn-success
                        @endif" href="{{asset('userpurces')}}/{{$singledata->id}}">User Purces</a>
                        <a class="btn btn-primary mb-2 d-block @if ($button=="userreceipt")
                        active
                        @endif" href="{{asset('userreceipt')}}/{{$singledata->id}}">Receipt</a>
                        <a class="btn btn-primary mb-2 d-block @if ($button=="userpayment")
                            active
                        @endif" href="{{asset('userpayment')}}/{{$singledata->id}}">Payment</a>

                    </div>
                    <div class="col-md-10">
                        @yield("userlayoutcontent")

                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection



