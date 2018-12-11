@extends('master')
@section('content')
<div id="content" class="Header container text-center">
    <h1> LARAVEL CRUD USERS EDIT </h1>
</div>
<div class="align-items-center">
<form action="{{asset('product/'. $product->id.'/updated')}}" method="post">
    <input type="hidden" name="_method" value="put" /> 
    <div class="form-group ">
    Name: <input type="text" name="name" placeholder="input name" value="{{$product->name}}"><br>
    </div>
    <div class="form-group ">
    Description: <input type="text" name="description" placeholder="input text" value="{{$product->description}}"><br>
    </div>
    <div class="form-group ">
    Unit_Price: <input type="text" name="unit_price" value="{{$product->unit_price}}"><br>
    </div>
    <div class="form-group ">
    Promotion_Price: <input type="text" name="promotion_price" value="{{$product->promotion_price}}"><br>
    </div>
    <div class="form-group ">
    Unit: <input type="text" name="unit" value="{{$product->unit}}"><br>
    </div>
    <div class="form-group ">
    new: <input type="text" name="new" value="{{$product->new}}"><br>
    </div>
    <div class="form-group ">
    <button type="submit">Save</button>
    {{ csrf_field() }}
    </div>
</form>
</div>
@endsection