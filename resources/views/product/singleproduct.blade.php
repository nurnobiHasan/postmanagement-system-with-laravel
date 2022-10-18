@extends("layout.layout")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 p-4 bg-info mt-5">
                <h4 class="text-center text-capitalize pt-4"><strong>{{$singleproduct->title}}</strong> Information:</h4>
                <a class="btn btn-success" href="{{asset('product')}}"><span><<</span>Go Back</a>
                <table class="table table-light mt-3 p-4">
                    <tr class="p-5">
                        <th class="text-left ">Product Id:</th>
                        <td class="text-left">{{$singleproduct->id}}</td>
                    </tr>
                    <tr class="p-5">
                        <th class="text-left ">Product Category:</th>
                        <td class="left">{{$singleproduct->category->title}}</td>
                    </tr>
                    <tr class="p-5">
                        <th class="text-left ">Product Name:</th>
                        <td class="text-left">{{$singleproduct->title}}</td>
                    </tr>
                    <tr class="p-5">
                        <th class="text-left ">Cost Prize:</th>
                        <td class="text-left">{{$singleproduct->cost_prize}}</td>
                    </tr>
                    <tr class="p-5">
                        <th class="text-left ">Sale Prize:</th>
                        <td class="text-left">{{$singleproduct->prize}}</td>
                    </tr>
                    <tr class="p-5">
                        <th class="text-left ">Product Description:</th>
                        <td class="text-left"><textarea name="" id="" cols="60" rows="8">{{$singleproduct->description}}</textarea></td>
                    </tr>
                </table>
                <form action="{{asset('product')}}/{{$singleproduct->id}}" method="post" class="d-inline-block">
                    @csrf
                    @method("delete")
                    <button onclick="confirm('r u sure delete?')" class="btn btn-danger text-capitalize text-center btn-sm"><i class="fa fa-delete"></i><span style="margin-left:8px">Delete Product</span></button>
                </form>
            </div>
        </div>
    </div>
@endsection



