@extends("layout.layout")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 p-4 bg-info mt-5">
                <h4 class="text-center text-capitalize pt-4"><strong>{{$singlecategory->title}}</strong> Information:</h4>
                <a class="btn btn-success" href="{{asset('category')}}"><span><<</span>Go Back</a>
                <table class="table table-light mt-3 p-4">
                    <tr class="p-5">
                        <th class="text-center">Category Id:</th>
                        <td class="text-center">{{$singlecategory->id}}</td>
                    </tr>
                    <tr class="p-5">
                        <th class="text-center">Category Name:</th>
                        <td class="text-center">{{$singlecategory->title}}</td>
                    </tr>
                    <tr class="p-5">
                        <th class="text-center">Careate_at:</th>
                        <td class="text-center">{{$singlecategory->created_at->diffForHumans()}}</td>
                    </tr>
                    <tr class="p-5">
                        <th class="text-center">Updated_at:</th>
                        <td class="text-center">{{$singlecategory->updated_at->diffForHumans()}}</td>
                    </tr>
                </table>
                <form action="{{asset('category')}}/{{$singlecategory->id}}" method="post">
                    @csrf
                    @method("delete")
                    <button onclick="return confirm('r u sure this data')" class="btn btn-danger">Delete Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection




