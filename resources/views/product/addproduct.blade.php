@extends("layout.layout")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                @if (isset($singleproduct->id))
                        <h4 class="text-center py-3 text-capitalize">Update ({{$singleproduct->title}}) information</h4>
                    @else
                        <h4 class="text-center mt-4">Add New Product:</h4>
                 @endif

                <form class="mt-4 p-5 bg-info" style="border-radius: 12px;margin-top:20px" action="{{asset('product')}}/{{$singleproduct->id}}" method="post">
                    <a href="{{asset('product')}}" class="btn btn-success mb-3"><<<span>Go Back</span></a>
                    @csrf
                    @if (isset($singleproduct->id))
                        @method("put")
                    @else
                        @method("post")
                    @endif

                    <div class="mb-3">
                      <label for="group" class="form-label">Select Product Category:</label>
                      @error("category")
                        <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      <select name="category"  id="category" class="form-control @error("category")
                          is-invalid
                      @enderror">
                            @if ($singleproduct->id)
                                <option value="{{$singleproduct->category->id}}">{{$singleproduct->category->title}}</option>
                                @else
                                <option value="">Select User Group</option>
                            @endif

                            @foreach ($allcagetory as $singlecategory)
                                <option value="{{$singlecategory->id}}">{{ $singlecategory->title}}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="name">Product Name: <span class="text-danger">***</span></label>
                      @error("name")
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      <input type="text" value="{{old('name',$singleproduct->title)}}" name="name" class="form-control @error("name")
                          is-invalid
                      @enderror" id="grouptitle" placeholder="Enter Product Name...">
                    </div>

                    <label for="description">Product Description:</label>
                    @error("description")
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <textarea name="description" placeholder="Write Product Description.........." id="description" style="height:120px" class="form-control">{{$singleproduct->description}}</textarea>

                    <div class="mb-3">
                        <label for="costprize">Product Cost Prize:<span class="text-danger">***</span></label>
                        @error("costprize")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" value="{{old('email',$singleproduct->cost_prize)}}" name="costprize" class="form-control @error("costprize")
                            is-invalid
                        @enderror" id="email" placeholder="Enter Product Cost Prize...">
                    </div>

                    <div class="mb-3">
                        <label for="saleprize">Product Sale Prize:<span class="text-danger">***</span></label>
                        @error("saleprize")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" value="{{old('saleprize',$singleproduct->prize)}}" name="saleprize" class="form-control @error("saleprize")
                            is-invalid
                        @enderror" id="phone" placeholder="Enter Product Sale Prize...">
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection



