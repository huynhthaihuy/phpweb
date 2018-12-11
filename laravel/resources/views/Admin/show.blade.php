@extends('master')
@section('content')
<div  class="Header container text-center">
    <h1> Show Người Dùng</h1>
</div>
<div id="content">
<table class="table table-bordered table-hover"><tr><th class='text-center'>ID</th><th class='text-center'>Name</th><th class="text-center">Email</th><th class="text-center">Password</th><th class="text-center">Phone</th><th class="text-center">Address</th><th class='text-center'>Action</th></tr>
    <tr scope="row"><td>{{$user->id}}</td>
    <td>{{$user->full_name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->password}}</td>
    <td>{{$user->phone}}</td>
    <td>{{$user->address}}</td>
    <td class="d-flex align-items-center justify-content-around">
    <form action="{{asset('admin/'. $user->id.'/edit')}}" method="GET"><button class="btn btn-warning rounded-0">Edit</button>
    </form>
    <form action="{{asset('admin/'. $user->id)}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" value="DELETE" name="_method"><button type="submit" class="btn btn-danger rounded-0">Delete</button></form>
    </td></tr>
</table>
</div>
@endsection