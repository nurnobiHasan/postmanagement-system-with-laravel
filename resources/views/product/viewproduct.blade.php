@extends("layout.layout")
@section("content")
<div class="container">
    <div class="col-md-12">
        <h5 class="text-center my-3">Product List:</h5>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    Users List Here
            </div>
            @if (session("createproduct"))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{session("createproduct")}}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session("updateproduct"))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{session("updateproduct")}}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session("deleteproduct"))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-2 my-3">
                        <div class="alert alert-success text-center text-capitalize">{{session("deleteproduct")}}</div>
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
                        <a class="btn btn-success mb-4"href="{{asset('product/create')}}"><i class="fa fa-plus"></i>Add New Prouct</a>
                    </div>
               </div>
                <table id="datatablesSimple" class="text-center">
                    <thead >
                        <tr>
                            <th class="text-center">Product Id</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Cost_prize</th>
                            <th class="text-center">Sale_prize</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">Product Id</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Cost_prize</th>
                            <th class="text-center">Sale_prize</th>
                            <th class="text-center">Action</th>
                        </tr>

                    </tfoot>
                    <tbody>
                        @forelse ($allproducts as $singleproduct)
                            <tr>
                                <td>{{$singleproduct->id??"N/a"}}</td>
                                <td>{{$singleproduct->category->title??"N/a"}}</td>
                                <td>{{$singleproduct->title??"N/a"}}</td>
                                <td>{{$singleproduct->cost_prize??"N/a"}}</td>
                                <td>{{$singleproduct->prize??"N/a"}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{asset('product')}}/{{$singleproduct->id}}"><i class="fa fa-eye"></i>Show Product</a>
                                    <a class="btn btn-primary text-capitalize btn-sm" href="{{asset('product')}}/{{$singleproduct->id}}/edit"><i class="fa fa-edit"></i>edit Product</a>
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
