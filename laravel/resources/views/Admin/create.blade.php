@extends('master')
@section('content')
<div id="content" class="Header container text-center">
    <h1> Tạo Users </h1>
</div>
<div class="align-items-center">
<form action="{{asset('admin')}}" method="POST">
{{csrf_field()}}
    <div class="form-group ">
    Name: <input type="text" name="name" placeholder="input name"><br>
    </div>
    <div class="form-group ">
    Email: <input type="Email" name="email" placeholder="input email"><br>
    </div>
    <div class="form-group ">
    PassWord: <input type="Password" name="password"><br>
    </div>
    <div class="form-group ">
    Phone: <input type="text" name="phone"><br>
    </div>
    <div class="form-group ">
    Address: <input type="text" name="address"><br>
    </div>
    <div class="form-group ">
    <button type="submit">Confirm</button>
    </div>
</form>
</div>
@endsection