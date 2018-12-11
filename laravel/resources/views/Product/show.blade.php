@extends('master')
@section('content')
<div class="Header container text-center">
    <h1> LARAVEL CRUD USERS DEMO </h1>
</div>
<div id="content">
<table class="table table-bordered table-hover"><tr><th class='text-center'>ID</th><th class='text-center'>Name</th><th class="text-center">Description</th><th class="text-center">Unit_Price</th><th class="text-center">Promotion_Price</th><th class="text-center">Image</th><th class="text-center">Category</th><th class='text-center'>Action</th></tr>
    <tr scope="row"><td>{{$product->id}}</td>
    <td>{{$product->name}}</td>
    <td>{{$product->description}}</td>
    <td>{{$product->unit_price}}</td>
    <td>{{$product->promotion_price}}</td>
    <td><img src="source/image/product/{{$product->image}}" alt="" height="100px"></td>
    <td>{{$product->product_type->name}}</td>
    <td class="d-flex align-items-center justify-content-around">
    <form action="{{asset('product/'. $product->id.'/edit')}}" method="GET"><button class="btn btn-warning rounded-0">Edit</button>
    </form>
    <form action="{{asset('product/'. $product->id)}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" value="DELETE" name="_method"><button type="submit" class="btn btn-danger rounded-0">Delete</button></form>
    </td></tr>
</table>
</div>
@endsection