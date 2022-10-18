@extends("layout.layout")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h4 class="text-center mt-4">Add Category Title:</h4>
                <form class="mt-4 p-5 bg-info" style="border-radius: 12px;margin-top:20px" action="{{asset('category')}}/{{$singlecategory->id}}" method="post">
                    @csrf
                    @if (isset($singlecategory->id))
                            @method("put")
                        @else
                            @method("post")
                    @endif

                    <div class="mb-3">
                      <label for="grouptitle" class="form-label">Category Title:</label>
                      @error("name")
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      <input type="text" value="{{old('name',$singlecategory->title)}}" name="name" class="form-control @error("name")
                          is-invalid
                      @enderror" id="grouptitle" placeholder="Enter user group title...">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
