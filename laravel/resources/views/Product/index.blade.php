@extends('master')
@section('content')
<div id="content" class="Header container text-center">
    <h1> Quản Lý Products </h1>
</div>
<div>
<table class="table table-bordered table-hover"><tr><th class='text-center'>ID</th><th class='text-center'>Name</th><th class='text-center'>Description</th><th class='text-center'>Unit_Price</th><th class='text-center'>Promotion_Price</th><th class='text-center'>Image</th><th class='text-center'>Action</th></tr>
@foreach($products as $product)
    <tr class="text-center"><td>{{$product->id}}</td>
    <td>{{$product->name}}</td>
    <td>{{$product->description}}</td>
    <td>{{$product->unit_price}}</td>
    <td>{{$product->promotion_price}}</td>
    <td><img src="source/image/product/{{$product->image}}" alt="" height="100px"></td>
    <td class="d-flex align-items-center justify-content-center">
    <form action="{{asset('product/' . $product->id)}}" method="GET">

    <button type="submit" class="btn btn-primary rounded-0">Show</button>
    </form>
    <form action="{{asset('product/'. $product->id.'/edit')}}" method="GET"><button type="submit" class="btn btn-warning rounded-0 mx-5">Edit</button>
    </form>
    <form action="{{asset('product/'. $product->id)}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" value="DELETE" name="_method"><button type="submit" class="btn btn-danger rounded-0">Delete</button></form>
    </td></tr>
@endforeach
</table>
</div>
<div id="content" class="container-fluid d-none d-xl-block align-items-center mt-3">
                <div class="row">
                    <div class="col-3">
                            <h1>CREATE USER</h1>
                            
                    </div>
                    <div class="col-9 d-flex justify-content-start align-items-center">
                    <form action="{{asset('product/create')}}" method="GET">
                            <button type="submit" class="btn btn-danger rounded-0">CREATE</button>
                    </form>
                    </div>
                </div>
            </div>
@endsection