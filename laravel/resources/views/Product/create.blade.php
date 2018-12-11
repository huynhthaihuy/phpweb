@extends('master')
@section('content')
<div id="content" class="Header container text-center">
    <h1> LARAVEL CRUD USERS CREATE</h1>
</div>
<div class="align-items-center">
<form action="{{asset('product')}}" method="POST">
{{csrf_field()}}
    <div class="form-group ">
    Name: <input type="text" name="name" placeholder="input name" class="ml-5"><br>
    </div>
    <div class="form-group ">
    Id_type: <input type="text" name="id_type" placeholder="input" class="ml-5"><br>
    </div>
    <div class="form-group ">
    Description: <input type="text" name="description" placeholder="input description" class="ml-5"><br>
    </div>
    <div class="form-group ">
    Unit_price: <input type="text" name="unit_price" placeholder="input unit_price" class="ml-5"><br>
    </div>
    <div class="form-group ">
    Promotion_Price: <input type="text" name="promotion_price" placeholder="input promotion_price" class="ml-5"><br>
    </div>
    <div class="form-group ">
    Image: <input type="text" name="image" placeholder="input image" class="ml-5"><br>
    </div>
    <div class="form-group ">
    Unit: <input type="text" name="unit" placeholder="input" class="ml-5"><br>
    </div>
    <div class="form-group ">
    New:<input type="text" name="new" placeholder="input" class="ml-5"><br>
    </div>
    <div> 
    Category:
    <select name="product_type" class="ml-5">
    @foreach($product_types as $product_type)
    <option value="{{$product_type->id}}">
    {{$product_type->name}}
    </option>
    @endforeach
</select>
    </div>
    <div class="form-group mt-3">
    <button type="submit">Confirm</button>
    </div>
</form>
</div>
@endsection