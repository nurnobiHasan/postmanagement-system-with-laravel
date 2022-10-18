@extends("layout.layout")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                @if (isset($singleuser->id))
                        <h4 class="text-center py-3 text-capitalize">Update {{$singleuser->name}} information</h4>
                    @else
                        <h4 class="text-center mt-4">Add New User:</h4>
                 @endif

                <form class="mt-4 p-5 bg-info" style="border-radius: 12px;margin-top:20px" action="{{asset('user')}}/{{$singleuser->id}}" method="post">
                    <a class="btn btn-success mb-4" href="{{asset('user')}}"><span><<</span>Go Back</a>
                    @csrf
                    @if (isset($singleuser->id))
                        @method("put")
                    @else
                        @method("post")
                    @endif

                    <div class="mb-3">
                      <label for="group" class="form-label">Select Group Name:</label>
                      @error("group")
                        <div class="alert alert-danger">{{$message}}</div>
                     @enderror
                      <select required="required" name="group" id="group" class="form-control">
                        @if ($singleuser->id)
                            <option value="{{$singleuser->group->id}}">{{$singleuser->group->title}}</option>
                            @else
                            <option value="">Select User Group</option>
                        @endif


                            @foreach ($usergroup as $singleusergroup)
                                <option value="{{$singleusergroup->id}}">{{ $singleusergroup->title}}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="name">User Name: <span class="text-danger">***</span></label>
                      @error("name")
                          <div class="alert alert-danger">{{$message}}</div>
                      @enderror
                      <input type="text" value="{{old('name',$singleuser->name)}}" name="name" class="form-control @error("name")
                          is-invalid
                      @enderror" id="grouptitle" placeholder="Enter User Name...">
                    </div>

                    <div class="mb-3">
                        <label for="email">User Email:<span class="text-danger">***</span></label>
                        @error("email")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="email" value="{{old('email',$singleuser->email)}}" name="email" class="form-control @error("email")
                            is-invalid
                        @enderror" id="email" placeholder="Enter User Email...">
                    </div>

                    <div class="mb-3">
                        <label for="phone">User Phone:<span class="text-danger">***</span></label>
                        @error("phone")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" value="{{old('phone',$singleuser->phone)}}" name="phone" class="form-control @error("phone")
                            is-invalid
                        @enderror" id="phone" placeholder="Enter User Phone...">
                    </div>

                    <div class="mb-3">
                        <label for="address">User Address:<span class="text-danger">***</span></label>
                        @error("address")
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" value="{{old('address',$singleuser->address)}}" name="address" class="form-control @error("address")
                            is-invalid
                        @enderror" id="address" placeholder="Enter User Address...">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

            </div>
        </div>
    </div>
@endsection



