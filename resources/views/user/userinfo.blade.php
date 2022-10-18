@extends("user.userlayout")
@section("userlayoutcontent")
    <table class="table table-striped mt-3 p-4">
        <tr class="p-5">
            <th class="text-center">User Id:</th>
            <td class="text-center">{{$singledata->id}}</td>
        </tr>
        <tr class="p-5">
            <th class="text-center">User Group:</th>
            <td class="text-center">{{$singledata->group->title??"N/A"}}</td>
        </tr>
        <tr class="p-5">
            <th class="text-center">User Name:</th>
            <td class="text-center">{{$singledata->name}}</td>
        </tr>
        <tr class="p-5">
            <th class="text-center">User Email:</th>
            <td class="text-center">{{$singledata->email}}</td>
        </tr>
        <tr class="p-5">
            <th class="text-center">User Phone:</th>
            <td class="text-center">{{$singledata->phone}}</td>
        </tr>
        <tr class="p-5">
            <th class="text-center">User Address:</th>
            <td class="text-center">{{$singledata->address}}</td>
        </tr>
    </table>
@endsection


