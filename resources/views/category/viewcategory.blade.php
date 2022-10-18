@extends("layout.layout")
@section("content")
  <div class="container">
    <div class="col-md-10 offset-1">
        <h5 class="text-center my-3">Category List:</h5>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Category List Here
            </div>
            @if (session("deletecategory"))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{session("deletecategory")}}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(session("createcategory"))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{session("createcategory")}}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(session("editcategory"))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2 my-3">
                            <div class="alert alert-success text-center text-capitalize">{{session("editcategory")}}</div>
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
                        <a class="btn btn-success mb-4"href="{{asset('category/create')}}"><i class="fa fa-plus"></i>Add New Category</a>
                    </div>
               </div>
                <table id="datatablesSimple" class="text-center">
                    <thead >
                        <tr>
                            <th class="text-center">Category Id</th>
                            <th class="text-center">Category Title</th>
                            <th class="text-center">Create_at</th>
                            <th class="text-center">Updated_at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Category Id</th>
                            <th>Category Title</th>
                            <th>Create_at</th>
                            <th>Updated_at</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($allcategory as $singlecategory)
                            <tr>
                                <td>{{$singlecategory->id}}</td>
                                <td>{{$singlecategory->title}}</td>
                                <td>{{$singlecategory->created_at->diffForHumans()}}</td>
                                <td>{{$singlecategory->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{asset('category')}}/{{$singlecategory->id}}"><i class="fa fa-eye"></i>View</a>
                                    <a class="btn btn-info btn-sm" href="{{asset('category')}}/{{$singlecategory->id}}/edit"><i class="fa fa-edit"></i>Edit</a>

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
