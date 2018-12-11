@extends('master')
@section('content')
<div id="content" class="Header container text-center">
    <h1> Chỉnh Sửa Users </h1>
</div>
<div class="align-items-center">
<form action="{{asset('admin/'. $user->id.'/updated')}}" method="post">
    <input type="hidden" name="_method" value="put" /> 
    <div class="form-group ">
    Name: <input type="text" name="name" placeholder="input name" value="{{$user->full_name}}"><br>
    Email: <input type="email" name="email" placeholder="input email" value="{{$user->email}}"><br>
    Password: <input type="password" name="password" required><br>
    Phone: <input type="text" name="phone" placeholder="input number" value="{{$user->phone}}"><br>
    Address: <input type="text" name="address" placeholder="input address" value="{{$user->address}}"><br>
    </div>
    <div class="form-group ">
    <button type="submit">Save</button>
    {{ csrf_field() }}
    </div>
</form>
</div>
@endsection